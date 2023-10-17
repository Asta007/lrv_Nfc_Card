let table = new DataTable('#table_client_list');

function deleteform(form){
    let conf = confirm("Etes vous certain de vouloire supprimer cet element ?");
    
    if (conf){
        let tmp = document.getElementById(form).submit();
    }
}

function showPreview(event,elemt){
console.log(elemt);
if(event.target.files.length > 0){
    let image = event.target.files[0];
    let src = URL.createObjectURL(image);
    let preview = document.getElementById(elemt);
    console.log(src);
    console.log(preview);
    preview.src = src
}
}