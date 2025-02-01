<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use PragmaRX\Google2FA\Google2FA;
use App\Models\Scopes\MasterScope;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google2fa_secret'
    ];

    /**
     * Encrypt the name before saving to the database
     */
    

    /**
     * Decrypt the name when retrieving it
     */
   
    public function generate2FASecret()
    {
        $google2fa = new Google2FA();
        $this->google2fa_secret = $google2fa->generateSecretKey();
        $this->save();

        return $this->google2fa_secret;
    }
    public function verify2FAToken($token)
    {
        $google2fa = new Google2FA();
        $check = $google2fa->verifyKey($this->google2fa_secret, $token);
        return $check;
    }
    public function is2FAEnabled()
    {
        return !empty($this->google2fa_secret);
    }
    
    public function scopeUsersActive($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    //  public function scopeEmployeeOnly($query, $id)
    // {
    //     return $query->where('type', 'Employee')->where('status','Active')->find($id);
    // }
    // public function scopeEmployeefdata($query, $id)
    // {
    //     return $query->where('type', 'Employee')->where('status','Active')->where('company_id',$id)->get();
    // }

    // public function Employee()
    // {
    //     return $this->belongsTo(Company_employee::class, 'emp_id');
    // }
    //  public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_id');
    // }
    public function totalCompany(){
        return $this->hasMany(UserCompany::class, 'user_id');
    }

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function scopeActiveOnly($query,$cmp)
    {
        return $query->orderBy('id', 'DESC');//->where('company_id',$cmp);
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
