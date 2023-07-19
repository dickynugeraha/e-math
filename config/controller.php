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
        header("Location: login-admin.php?error=Username is required");
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
                $_SESSION['adminId'] = $row['id'];
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
    $_SESSION['name'] = $row['child_name'];
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
// ---------------------------------------------- FUNGSI QUIZ -------------------------------------------------------
function createQuiz($post)
{
    global $db;

    $question = $post['question'];
    $type = $post['type'];
    $a = $post['a'];
    $b = $post['b'];
    $c = $post['c'];
    $d = $post['d'];
    $img = $post['img'];
    $correct = $post['correct'];
    $description_answer = $post['description'];

    // var_dump($post);
    // die();

    $query = "INSERT INTO quiz VALUES (null, '$type', '$question', '$img')";
    mysqli_query($db, $query);

    $quiz_latest = select("SELECT * FROM quiz ORDER BY id DESC");
    $quizId = $quiz_latest[0]["id"];

    $query2 = "INSERT INTO answers VALUES (null, $quizId, '$a','$b', '$c', '$d', '$correct', '$description_answer')";
    mysqli_query($db, $query2);

    return mysqli_affected_rows($db);
}

function deleteQuiz($id)
{
    global $db;

    $query = "DELETE FROM quiz WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function updateTebakGambar($post)
{
    global $db;

    $question = $post["question"];
    $quizId = $post["quizId"];
    $a = $post["a"];
    $b = $post["b"];
    $c = $post["c"];
    $d = $post["d"];
    $correct = $post["correct"];

    $query = "UPDATE quiz t1 
    JOIN answers t2 ON (t1.id = t2.quizId) 
    SET t1.question = '$question', 
        t2.a = '$a', 
        t2.b = '$b', 
        t2.c = '$c', 
        t2.d = '$d', 
        t2.correct = '$correct' 
    WHERE t1.id = '$quizId'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function updatePilihanGanda($post)
{
    global $db;

    $question = $post["question"];
    $img = $post["img"];
    $quizId = $post["quizId"];
    $a = $post["a"];
    $b = $post["b"];
    $c = $post["c"];
    $d = $post["d"];
    $correct = $post["correct"];
    $description = $post["description"];


    $query = "UPDATE quiz t1 
    LEFT JOIN answers t2 ON (t1.id = t2.quizId) 
    SET t1.question = '" . $question . "',
        t1.img = '" . $img . "',
        t2.a = '" . $a . "',
        t2.b = '" . $b . "',
        t2.c = '" . $c . "',
        t2.d = '" . $d . "', 
        t2.correct = '" . $correct . "',
        t2.description = '" . $description . "'
    WHERE t2.id = '" . $quizId . "'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ---------------------------------------------------------- FUNGSI REPORT --------------------------------------------

function createNilai($post)
{
    global $db;
    $userId = $post["userId"];
    $nilai = $post["nilai"];
    $type = $post["type"];

    $query = "INSERT INTO reports VALUES (null, '$userId', '$nilai', '$type')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// ------------------------------------------ FUNGSI FORUM ---------------------------------------------------

function createForum($post)
{
    global $db;
    $title = $post["title"];

    $query = "INSERT INTO forum VALUES (null, '$title', null)";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function deleteForum($id)
{
    global $db;

    $query = "DELETE FROM forum WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function createDiskusi($post)
{
    global $db;
    $forumId = $post["forumId"];
    $name = $post["name"];
    $description = $post["description"];
    $user_status = $post["user_status"];

    $query = "INSERT INTO forum_item VALUES (null, '$name', '$description', '$forumId', '$user_status', null)";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
