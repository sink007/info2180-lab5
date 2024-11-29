document.addEventListener('DOMContentLoaded', function(){
    const lookup= document.getElementById("lookup");
    const result= document.getElementById("result");
    const field= document.getElementById("country");
    lookup.addEventListener("click",function(){
        const country= field.value;
        let clean = DOMPurify.sanitize(country);
        let url = 'http://localhost/info2180-lab5/world.php';
        if (clean) { 
            url += `?country=${clean}`;  
        }
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