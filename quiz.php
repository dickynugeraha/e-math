<?php
session_start();
$title = "Quiz";
include 'layout/header-user.php';

if ($_SESSION["email"]){
  $quizzes = select("SELECT * FROM quiz INNER JOIN answers ON quiz.id = answers.quizId WHERE quiz.type != 'tebak_gambar'");
?>

<div class="container mb-5" style="display: flex; justify-content: center;">
        <div class="card quiz" id="quiz">
          <div style="padding: 3rem; padding-bottom: 4rem;">
          <div class="text-center" class="wrap_image_question">
            <img id="question_img" style="width: 200px; height:200px;" src="" alt="gambar-soal" srcset="">

          </div>
            <h5 class="mb-3 question" style="padding-top: 1rem; padding-bottom:1rem;">Soal!</h5>
              <div>
                <input type="radio" name="answer" id="a">
                <label class="ml-3 answer" for="a" id="a_text">Answer 1</label>
              </div>
              <br>
              <div>
                <input type="radio" name="answer" id="b">
                <label class="ml-3 answer" for="b" id="b_text">Answer 2</label>
              </div>
              <br>
              <div>
                <input type="radio" name="answer" id="c">
                <label class="ml-3 answer" for="c" id="c_text">Answer 3</label>
              </div>
              <br>
              <div>
                <input type="radio" name="answer" id="d">
                <label class="ml-3 answer" for="d" id="d_text">Answer 4</label>
              </div>
          </div>
          <button style='position: absolute;bottom: 0;width: 100%;border-radius: 0 0 15px 15px;' type="submit" id="submit" class="submit btn btn-info btn-lg">Submit</button>
        </div>
</div>

<script type="text/javascript">

  let allQuizzes = new Array();
  let quizzes = new Array();

  <?php
  for ($i=0; $i < count($quizzes) ; $i++) { 
   ?>
      allQuizzes.push({
        'id': '<?php echo $quizzes[$i]['id']?>',
        'type': '<?php echo $quizzes[$i]['type']?>',
        'question': '<?php echo $quizzes[$i]['question']?>',
        'img': '<?php echo $quizzes[$i]['img']?>',
        'quizId': '<?php echo $quizzes[$i]['quizId']?>',
        'a': '<?php echo $quizzes[$i]['a']?>',
        'b': '<?php echo $quizzes[$i]['b']?>',
        'c': '<?php echo $quizzes[$i]['c']?>',
        'd': '<?php echo $quizzes[$i]['d']?>',
        'correct': '<?php echo $quizzes[$i]['correct']?>',
        'description': '<?php echo $quizzes[$i]['description']?>',
      })
  <?php
  }
  ?>

  allQuizzes = allQuizzes.sort(() => Math.random() - 0.5);

  for (let i = 0; i < 5; i++) {
    quizzes.push(allQuizzes[i]);
  }

  const quiz = document.getElementById("quiz");
  const submitBtn = document.getElementById("submit");
  const question = document.querySelector(".question")
  const answers = document.querySelectorAll("input[name='answer']")
  const img = document.getElementById("question_img");
  const aText = document.getElementById("a_text");
  const bText = document.getElementById("b_text");
  const cText = document.getElementById("c_text");
  const dText = document.getElementById("d_text");

  let currentQuiz = 0;
  let score = 0;

  loadQuiz();

  function loadQuiz(){
    diselectAnswers()

    const currentQuizData = quizzes[currentQuiz];
    img.src = currentQuizData.img;
    question.innerText = currentQuizData.question;
    aText.innerText = currentQuizData.a;
    bText.innerText = currentQuizData.b;
    cText.innerText = currentQuizData.c;
    dText.innerText = currentQuizData.d;
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
        alert(`Yess, Jawabanmu benarr`);
        score += 100;
      } else {
        alert(`Ups, jawabanmu kurang tepat..\n${quizzes[currentQuiz].description}`);
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