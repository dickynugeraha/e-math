<?php

// ------------------------------------- FUNGSI SELECT * FROM ---------------------------------------
function select($query)
{
    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// -------------------------------------- FUNGSI AUTENTIKASI ----------------------------------------
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function loginAdmin($post)
{
    // panggil koneksi database
    global $db;
    $username = $post["username"];
    $password = $post["password"];

    $username = validate($username);
    $pass = validate($password);

    if (empty($username)) {
        header("Location: login-admin.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login-admin.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$pass'";

        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: login-admin.php?error=Salah Username atau password !");
                exit();
            }
        } else {
            header("Location: login-admin.php?error=Salah Username atau password !");
            exit();
        }
    }
}

function loginUser($post)
{
    global $db;
    $email = $post["email"];
    $password = $post["password"];

    $query = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $verifyPassword = password_verify($password, $row["password"]);
        if (!$verifyPassword) {
            echo "<script>
                alert('Salah Password, silahkan input kembali!');
                document.location.href = 'login-user.php';
                </script>";
            exit();
            return;
        }
    } else {
        echo "<script>
                alert('User tidak tersedia, silahkan register!');
                document.location.href = 'login-user.php';
                </script>";
        exit();
        return;
    }
    $_SESSION['email'] = $row['email'];
    $_SESSION['userId'] = $row['id'];
    echo "<script>
        alert('Login berhasil!');
        document.location.href = 'index.php';
        </script>";
    exit();
    return;
}

function registerUser($post)
{
    global $db;
    $parent_name = $post["parent_name"];
    $child_name = $post["child_name"];
    $email = $post["email"];
    $password = $post["password"];
    $confirmPassword = $post["confirm_password"];

    $query = "SELECT * FROM users WHERE email='$email'";
    $user = mysqli_query($db, $query);

    if (mysqli_num_rows($user) >= 1) {
        echo "<script>
        alert('Email sudah terpakai!');
        document.location.href = 'login-user.php';
        </script>";
        exit();
        return;
    }
    if ($password !== $confirmPassword) {
        echo "<script>
        alert('Konfirm password tidak sama!');
        document.location.href = 'login-user.php';
        </script>";
        exit();
        return;
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (id, parent_name, child_name, email, password) VALUES(null, '$parent_name', '$child_name', '$email', '$passwordHash')";
    mysqli_query($db, $query);
    echo "<script>
        alert('Register berhasil, silahkan lakukan login !');
        document.location.href = 'login-user.php';
        </script>";
    exit();
    return;
}
