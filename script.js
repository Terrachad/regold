
    const url = 'http://test/get_client'
    var obj = "";

    fetch(url)
    .then(res => res.json())
    .then(data => {
        obj = data;
      })


   
    



    const myForm = document.getElementById('mainForm');

    myForm.addEventListener('submit', function(e){
        console.log(obj.client_id);
        e.preventDefault();

        const formData = new FormData(this);

        var value = Object.fromEntries(formData.entries());
        value.codice_cliente = obj.client_id;

        
        fetch('/receive.php', {
            headers: {
                'Content-Type': 'application/json'
              },
            method:'POST',
            body: JSON.stringify(value)
        }).then(function(response){
            return response.text();
        }).then(function(text){
            alert(text)
        }).catch(function(error){
            console.log(error)
        })
    })