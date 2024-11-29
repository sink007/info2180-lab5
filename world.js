document.addEventListener('DOMContentLoaded', function(){
    const lookup= document.getElementById("lookup");
    const lookcities= document.getElementById("lookcities");
    const result= document.getElementById("result");
    const field= document.getElementById("country");
    lookup.addEventListener("click",function(){
        const country= field.value;
        let url = 'http://localhost/info2180-lab5/world.php';
        url += `?country=${country}&lookup=countries`;  
        fetch(url)
        .then(response => response.text())
        .then(data => {
            result.innerHTML= data;
        })
        .catch(error => {
            console.log(error);
        });
    })

    lookcities.addEventListener("click",function(){
        const country= field.value;
        let url = 'http://localhost/info2180-lab5/world.php';
        url += `?country=${country}&lookup=cities`;  
        fetch(url)
        .then(response => response.text())
        .then(data => {
            result.innerHTML= data;
        })
        .catch(error => {
            console.log(error);
        });
    })
})