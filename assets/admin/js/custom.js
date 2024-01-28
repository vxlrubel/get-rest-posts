;(function($){
    'use strict';
    const doc = $(document);

    class GetRestPostsAdminScript{
        constructor(){
            this.counter();
        }

        counter(){
            $('.grp-count').on('click', 'a', function(e){
                e.preventDefault();
                alert( $(this).attr('class') );
                console.log( $(this) );
            });
        }
    }

    doc.ready(()=>{new GetRestPostsAdminScript()});
    
})(jQuery);