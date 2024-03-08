editor();

function editor(){
    for (var i = 0; i < 3; i++){
    ClassicEditor
        .create( document.querySelector( i == 0 ? '#description' : i == 1 ? '#about' : '#location'), {
            language: {
                ui: 'ar',
                content: 'ar'
            },
            toolbar: {
                items: [
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
}



    function readCoverImage(input, id){
        document.getElementById(id).style.display = "none";
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                document.getElementById(id).style.display = "flex";
                document.querySelector('#'+id).setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    