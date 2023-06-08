<?php
session_start();
$title = "Quiz";
include 'layout/header-user.php';

if ($_SESSION["email"]){
  $quizzes = select("SELECT * FROM quiz INNER JOIN answers ON quiz.id = answers.quizId WHERE quiz.type = 'tebak_gambar'");
?>

<div class="container mb-5" style="display: flex; justify-content: center;">
        <div class="card quiz" id="quiz">
          <div style="padding: 3rem; padding-bottom: 4rem;">
          <div class="text-center" class="wrap_image_question">
          </div>
            <h5 class="mb-3 question" style="padding-top: 1rem; padding-bottom:1rem;">Soal!</h5>
              <div class="d-flex flex-wrap">
                <div style="flex: 50%;">
                  <div>
                    <input type="radio" name="answer" id="a">
                    <img src="" class="ml-3 answer" for="a" id="a_img"/>
                  </div>
                  <div>
                    <input type="radio" name="answer" id="b">
                    <img src="" class="ml-3 answer" for="b" id="b_img"/>
                  </div>
                </div>
                <div style="flex: 50%;">
                  <div>
                    <input type="radio" name="answer" id="c">
                    <img src="" class="ml-3 answer" for="c" id="c_img"/>
                  </div>
                  <div>
                    <input type="radio" name="answer" id="d">
                    <img src="" class="ml-3 answer" for="d" id="d_img"/>
                  </div>
                </div>
              </div>
          </div>
          <button style='position: absolute;bottom: 0;width: 100%;border-radius: 0 0 15px 15px;' type="submit" id="submit" class="submit btn btn-info btn-lg">Submit</button>
        </div>
</div>

<script type="text/javascript">
const quiz = document.getElementById("quiz");
const submitBtn = document.getElementById("submit");
const question = document.querySelector(".question")
const answers = document.querySelectorAll("input[name='answer']")
const aImg = document.getElementById("a_img");
const bImg = document.getElementById("b_img");
const cImg = document.getElementById("c_img");
const dImg = document.getElementById("d_img");
let allQuizzes = new Array();
let quizzes = new Array();
let currentQuiz = 0;
let score = 0;
$(document).ready(function () {
                $.ajax({
                    method: "GET",
                    url: "fetch_tebak_gambar.php",
                }).success(function(data){
                  let obj_data = JSON.parse(data);
                  fetchQuiz = obj_data;
                  for (let key in fetchQuiz) { 
                    let quiz = fetchQuiz[key]
                      allQuizzes.push({
                        'id': quiz["id"],
                        'type': quiz["type"],
                        'question': quiz["question"],
                        'quizId': quiz["quizId"],
                        'a': quiz["a"],
                        'b': quiz["b"],
                        'c': quiz["c"],
                        'd': quiz["d"],
                        'correct': quiz["correct"],
                      })
                  }
                  
                  allQuizzes = allQuizzes.sort(() => Math.random() - 0.5);

                  for (let i = 0; i < 5; i++) {
                    quizzes.push(allQuizzes[i]);
                  }
                  loadQuiz();

                })
      })


  
   function loadQuiz(){
    diselectAnswers()
    const currentQuizData = quizzes[currentQuiz];
    question.innerText = currentQuizData.question;
    aImg.src = currentQuizData.a;
    bImg.src = currentQuizData.b;
    cImg.src = currentQuizData.c;
    dImg.src = currentQuizData.d;
  }

  function diselectAnswers(){
    answers.forEach(answer => answer.checked = false);
  }

  function getSelected(){
    let answer;
    for (const ans of answers) {
      if (ans.checked) {
        answer = ans.id;
        break;
      }
    }
    return answer;
  }

  submitBtn.addEventListener("click", () => {
    const answer = getSelected();
    if(answer) {
      if(answer === quizzes[currentQuiz].correct){
        alert("Yess, jawaban kamu benar");
        score += 100;
      } else {
        alert("Ups, Jawabanmu kurang tepat");
      }
      currentQuiz++
      if (currentQuiz < quizzes.length){
        loadQuiz();
      } else  {
        quiz.innerHTML = `
        <div style="padding: 3rem; padding-bottom: 4rem;">
          <h5 class='text-center'>Kamu mendapatkan nilai <i>${score/quizzes.length}</i>, dari 5 soal yang sudah dikerjakan</h5>
        </div>
        <button style='position: absolute;bottom: 0;width: 100%;border-radius: 0 0 15px 15px;' onclick='location.reload()' class='submit btn btn-info btn-lg'>Reload</button>`;
      }
    }
  });

</script>

<?php
} else {
    header("Location: login-user.php");
    exit();
}
include 'layout/footer-user.php';
?>