editor();

function editor(){
    ClassicEditor
        .create( document.querySelector( '#description' ), {
            language: {
                ui: 'ar',
                content: 'ar'
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'undo',
                    'redo',
                    '|',
                    'Blockqote'
                ]
            }
        } )
        .catch( error => {
            console.error( error );
        } );

}



    var isCurrcncyFieldNotNull = document.getElementById('price').value  !== '';
    if(isCurrcncyFieldNotNull){
        document.getElementById("currency-div").style.visibility = "visible";
    }    
    else
        document.getElementById("currency-div").style.visibility = "hidden";


        $(function(){
            $('#price').on('keyup', function(){
                var isCurrcncyFieldNotNull = document.getElementById('price').value  !== '';
                if(isCurrcncyFieldNotNull){
                    document.getElementById("currency-div").style.visibility = "visible";
                }    
                else
                    document.getElementById("currency-div").style.visibility = "hidden";
            
            });
        });


    function readCoverImage(input){
        document.getElementById("cover-image-thumb").style.display = "none";
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                document.getElementById("cover-image-thumb").style.display = "flex";
                document.querySelector('#cover-image-thumb').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // document.querySelector('#images').addEventListener('change', function() {
    //     if (this.files.length > 3) {
    //         alert('لا يمكن تحميل أكثر من 3 صور');
    //         // حذف الصور التي تزيد عن 3
    //         // this.files = Array.from(this.files).slice(0, 3);
    //             //         this.value = ''; // مسح الصور المحددة
    //     }

        
    // });

    function readMultiImages(input){
        document.getElementById("image-thumb-1").style.display = "none";
        document.getElementById("image-thumb-2").style.display = "none";
        document.getElementById("image-thumb-3").style.display = "none";

            if (input.files.length > 3) {
            alert('لا يمكن تحميل أكثر من 3 صور');
            // حذف الصور التي تزيد عن 3
            // this.files = Array.from(this.files).slice(0, 3);
            //  input.value = ''; // مسح الصور المحددة
        }
        if (input.files){
                if(input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    document.getElementById("image-thumb-1").style.display = "inline-flex";
                    document.querySelector('#image-thumb-1').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
            if(input.files[1]){
                var reader = new FileReader();
                reader.onload = function(e){
                    document.getElementById("image-thumb-2").style.display = "inline-flex";
                    document.querySelector('#image-thumb-2').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[1]);
            }
            if(input.files[2]){
                var reader = new FileReader();
                reader.onload = function(e){
                    document.getElementById("image-thumb-3").style.display = "inline-flex";
                    document.querySelector('#image-thumb-3').setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[2]);
            }
        }
        

    //     if(input.files){
    //     for(var i = 0; i < input.files.length; i++){
    //         var reader = new FileReader();
    //         reader.onload = function(e){
    //             document.querySelector('#image-thumb-' + (i+1)).setAttribute('src', e.target.result);
    //         };
    //         reader.readAsDataURL(input.files[i]);
    //     }       
    // }   
}