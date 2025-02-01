<?php
namespace App\Traits;
use Illuminate\Http\Request;
use App\Amyservices\Interfaces\CommonInterface;

trait CommonTraits
{
    private $commonService;

    public function __construct(CommonInterface $commonServices)
    {
        $this->commonService = $commonServices;
        $this->middleware('auth');
    }
    public function getSearchableData()
    { 
        $data = $this->commonService->getSearchDataForItem();       
        return response()->json([
            'categories' => $data[0],
            'subcategories' => $data[1],
            'itemGroups' => $data[2],
        ]);
    }
    public function getCategoriesSubcategory(Request $request)
    { 
        $data = self::helper('ModelHelper')::children_by_parent('SubCategory','category_id',$request->category_id);
        return $data;
    }
    public function getFilterItemsList(Request $request)
    { 
        $data = $this->commonService->getFilteredItemList($request);        
        return $data;
    }
}