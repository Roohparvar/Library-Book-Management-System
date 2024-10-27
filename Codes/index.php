<!DOCTYPE html>
<html lang="en">
<head>
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Login</title>
  
  <style>
  
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  .login-container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 300px;
    text-align: center;
    margin-bottom: 20px;
  }

  .login-header, .registration-header {
    background-color: #333;
    color: #fff;
    padding: 15px;
  }

  .login-body, .registration-body {
    padding: 20px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
  }

  .form-group input {
    width: 75%;
    padding: 8px;
    box-sizing: border-box;
  }

  .login-btn, .register-btn {
    background-color: #333;
    color: #fff;
    padding: 10px;
    border: none;
    width: 100%;
    cursor: pointer;
  }

  .register-btn {
    background-color: #4285f4; 
    margin-top: 10px; 
  }
  
  .modal {
  display: none; 
  position: fixed; 
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; 
  background-color: rgba(0, 0, 0, 0.4);
  }
  
  .modal-content {
  background-color: #fefefe;
  margin: 10% auto; 
  padding: 20px;
  border: 1px solid #888;
  width: 80%; 
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
  }
  
  form {
  display: flex;
  flex-direction: column;
  }
  
  label {
  margin-bottom: 8px;
  }
  
  input {
  padding: 8px;
  margin-bottom: 16px;
  }
  
  button {
  background-color: #4caf50;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  }
  
  button:hover {
  background-color: #45a049;
  }
  
  </style>
  
</head>

<body>
    
    <div class="login-container">
        
        <div class="login-header">
            <h2>Login</h2>
        </div>
        
        <div class="login-body">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Enter your username">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password">
            </div>
        
            <div class="form-group">
                <label for="user-type">User Type</label>
                <select id="user-type">
                    <option value="admin">Admin</option>
                    <option value="user">Regular User</option>
                </select>
            </div>
        
        <button class="login-btn" onclick="login()">Login</button>
        <button class="register-btn" onclick="openRegistrationForm()">Register New User</button>
        
        </div>
    </div>
    
    <div id="registrationModal" class="modal">
        
        <div class="modal-content">
            <span class="close" onclick="closeRegistrationForm()">&times;</span>
            <form id="registrationForm" onsubmit="registerUser(); return false;">
                <label for="username">Username:</label>
                <input type="text" id="username_Modal" name="username_Modal" required>
                <label for="password">Password:</label>
                <input type="password" id="password_Modal" name="password_Modal" required>
                <button type="submit">Register</button>
            </form>
        </div>
        
    </div>
    
    <script>
    function login() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var userType = document.getElementById('user-type').value;
        
        fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: username,
                password: password,
                userType: userType,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                var redirectUrl = data.redirectUrl;
                window.location.href = redirectUrl;
            } else {
                alert('Wrong username or password');
            }
        })
        .catch(error => console.error('Error:', error));
  }
    
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("registrationModal").style.display = "none";
    });
    
    function openRegistrationForm() {
        document.getElementById("registrationModal").style.display = "block";
    }
    function closeRegistrationForm() {
        document.getElementById("registrationModal").style.display = "none";
    }
    function registerUser() {
        var username = document.getElementById("username_Modal").value;
        var password = document.getElementById("password_Modal").value;
        if (username.trim() === "") {
            alert("Error: Username cannot be empty");
            return;
        }

        console.log("Username:", username);
        console.log("Password:", password);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                alert(xhr.responseText);
                closeRegistrationForm();
            } else {
                alert("Error occurred during registration. Please try again.");
            }
        }
        };

        xhr.open("POST", "register.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var formData = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
        xhr.send(formData);
    }
</script>

</body>
</html>