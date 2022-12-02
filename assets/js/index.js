
(() => {

    let baseUrl = "http://10.211.55.3/pdo/";

    function connectToDB(e) {

        e.preventDefault();

        let form = document.getElementById("form-connect");
        let formData = new FormData(form);

       let requestOptions = {
           method: 'POST',
           body: formData
       };

       fetch(baseUrl + "connect-to-db.php", requestOptions)
           .then(response => response.json())
           .then(result => {
               if(result.success) {
                   window.alert(result.msg);
               }
           })
           .catch(error => console.log('error', error));
    }

    document.getElementById("btn-start-session").addEventListener("click", connectToDB);

    function select(e) {

        fetch(baseUrl + "select.php")
            .then(response => response.json())
            .then(result => {
                if(result.success) {
                    window.alert(result.msg);
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("btn-select").addEventListener("click", select);

    function selectOne(e) {

        e.preventDefault();

        let form = document.getElementById("form-select-one");
        let formData = new FormData(form);

        let requestOptions = {
            method: 'POST',
            body: formData
        };

        fetch(baseUrl + "select-one.php", requestOptions)
            .then(response => response.json())
            .then(result => {
                if(result.success) {
                    window.alert(result.msg);
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("btn-select-one").addEventListener("click", selectOne);

    function selectTwo(e) {

        e.preventDefault();

        let form = document.getElementById("form-select-two");
        let formData = new FormData(form);

        let requestOptions = {
            method: 'POST',
            body: formData
        };

        fetch(baseUrl + "select-two.php", requestOptions)
            .then(response => response.json())
            .then(result => {
                if(result.success) {
                    window.alert(result.msg);
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("btn-select-two").addEventListener("click", selectTwo);

    function insert(e) {

        e.preventDefault();

        let form = document.getElementById("form-insert");
        let formData = new FormData(form);

        let requestOptions = {
            method: 'POST',
            body: formData
        };

        fetch(baseUrl + "insert.php", requestOptions)
            .then(response => response.json())
            .then(result => {
                if(result.success) {
                    window.alert(result.msg);
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("btn-insert").addEventListener("click", insert);

    function del(e) {

        e.preventDefault();

        let form = document.getElementById("form-delete");
        let formData = new FormData(form);

        let requestOptions = {
            method: 'POST',
            body: formData
        };

        fetch(baseUrl + "delete.php", requestOptions)
            .then(response => response.json())
            .then(result => {
                if(result.success) {
                    window.alert(result.msg);
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("btn-delete").addEventListener("click", del);

    function edit(e) {

        e.preventDefault();

        let form = document.getElementById("form-edit");
        let formData = new FormData(form);

        let requestOptions = {
            method: 'POST',
            body: formData
        };

        fetch(baseUrl + "edit.php", requestOptions)
            .then(response => response.json())
            .then(result => {
                if(result.success) {
                    window.alert(result.msg);
                }
            })
            .catch(error => console.log('error', error));
    }

    document.getElementById("btn-edit").addEventListener("click", edit);

})();
