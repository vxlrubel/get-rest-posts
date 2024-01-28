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
                let _self         = $(this);
                let _thisClass    = _self.attr('class');
                let _input        = _self.siblings('input');
                let inputValue    = _input.val();
                let inputMinValue = parseInt( _input.attr('min') );
                let inputMaxValue = parseInt( _input.attr('max') );
                let inputStep     = parseInt( _input.attr('step') );

                if( _thisClass === 'minus' ){
                    if ( inputMinValue < inputValue ){
                        _input.val( parseInt(inputValue, 10) - inputStep );
                    }
                }
                if ( _thisClass === 'plus' ){
                    if ( inputMaxValue > inputValue ){
                        _input.val(parseInt(inputValue, 10 ) + inputStep);
                    }
                }
            });
        }
    }

    doc.ready(()=>{new GetRestPostsAdminScript()});
    
})(jQuery);