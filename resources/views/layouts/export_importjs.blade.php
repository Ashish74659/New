<script> 
    document.addEventListener('DOMContentLoaded', function () { 
    document.querySelectorAll('.exportLink').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault(); 
            document.querySelector('.loader-wrapper').style.display = 'block';
            var iframe = document.createElement('iframe');
            iframe.src = this.href;
            document.body.appendChild(iframe);
            iframe.onload = function () { 
                document.querySelector('.loader-wrapper').style.display = 'none';
                setTimeout(function () {
                    document.body.removeChild(iframe);
                }, 1000);
            };
        });
    });
});

</script>