function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    if (username === "" || password === "") {
        alert("Username and password cannot be empty");
        return false;
    }
    return true;
}

function addProduct() {
    var pname = document.getElementById('pname').value;
    var pprice = document.getElementById('pprice').value;
    var pimage = document.getElementById('pimage').value;

    if (pname === '' || pprice === '' || pimage === '') {
        alert('All fields must be filled out');
        return false;
    }

    // Data to be sent to the server
    let formData = new FormData();
    formData.append('pname', pname);
    formData.append('pprice', pprice);
    formData.append('pimage', pimage);

    // Send data to add_product.php using fetch API
    fetch('add_product.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // handle response data
        if(data.success) {
            var productDiv = document.createElement('div');
            productDiv.innerHTML = `Name: ${pname}, Price: $${pprice} <img src="${pimage}" alt="${pname}">`;
            document.getElementById('products').appendChild(productDiv);
            document.getElementById('product-form').reset();
        } else {
            alert('Error adding product');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while adding the product.');
    });

    return false;
}

function logout() {
    window.location.href = 'logout.php'; // Redirect to logout PHP script
    checkCookie();
}


function checkCookie() {
    var username = getCookie("username");
    if (username != "") {
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('admin-dashboard').style.display = 'block';
    } else {
        document.getElementById('login-form').style.display = 'block';
        document.getElementById('admin-dashboard').style.display = 'none';
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

window.onload = checkCookie
