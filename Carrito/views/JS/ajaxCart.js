let prod = document.getElementsByClassName('prod')
let arrayProd = [...prod]
arrayProd.forEach(element => {
    element.addEventListener("submit", function(e){
        e.preventDefault();
        const url = '../Data/actionCart.php'
        const xhr = new XMLHttpRequest()
        let formData = new FormData(e.target)
        xhr.open("POST",url ,true)
        xhr.send(formData)
    })
});

let add_subtrat = document.getElementsByClassName('add_substract')
let arrayAdd_subtrat = [...add_subtrat]
arrayAdd_subtrat.forEach(element => {
    element.addEventListener("click", function(e){
        e.preventDefault();
        const url = '../Data/actionCart.php'
        let data = {
            action: e.target.value,
            id: e.target.id
        }
        // Usar el método $.ajax de jQuery para enviar la petición
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(response){
                let data = JSON.parse(response)
                if(data.qty <= 0){
                    document.getElementById('prod'+data.id).remove()
                    document.getElementById('total').innerHTML = data.total 
                }
                else{
                    document.getElementById('qty'+data.id).innerHTML = data.qty
                    document.getElementById('sub'+data.id).innerHTML = data.subtotal
                    document.getElementById('total').innerHTML = data.total 
                }
            },
            error: function(error){
                console.error(error);
            }
        });
    })
});
     