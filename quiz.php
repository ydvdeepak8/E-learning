<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineering Quiz</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.quiz-container {
    width: 90%;
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    text-align: center;
}

h1 {
    font-size: 2em;
    color: #333;
    margin-bottom: 20px;
}

.question {
    background: #f2f2f2;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: left;
}

p {
    font-size: 1.1em;
    color: #555;
}

label {
    display: block;
    margin: 10px 0;
    font-size: 1em;
    color: #333;
}

input[type="radio"] {
    margin-right: 10px;
}

button {
    padding: 15px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1.2em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.result {
    margin-top: 30px;
    font-size: 1.2em;
    font-weight: bold;
    color: #333;
}

    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>Software Engineering Quiz</h1>
        <form id="quiz-form">
            <div class="question">
                <p>1. What does the acronym UML stand for?</p>
                <label><input type="radio" name="q1" value="Unified Modeling Language"> Unified Modeling Language</label><br>
                <label><input type="radio" name="q1" value="Universal Modeling Language"> Universal Modeling Language</label><br>
                <label><input type="radio" name="q1" value="Unified Modelling Language"> Unified Modelling Language</label><br>
                <label><input type="radio" name="q1" value="Universal Modelling Language"> Universal Modelling Language</label>
            </div>
            <div class="question">
                <p>2. What is the main purpose of a software requirements specification (SRS)?</p>
                <label><input type="radio" name="q2" value="To provide a blueprint for the system design"> To provide a blueprint for the system design</label><br>
                <label><input type="radio" name="q2" value="To list all the software bugs"> To list all the software bugs</label><br>
                <label><input type="radio" name="q2" value="To define the functional and non-functional requirements"> To define the functional and non-functional requirements</label><br>
                <label><input type="radio" name="q2" value="To outline the project management plan"> To outline the project management plan</label>
            </div>
            <div class="question">
                <p>3. Which of the following is a common software development model?</p>
                <label><input type="radio" name="q3" value="Waterfall Model"> Waterfall Model</label><br>
                <label><input type="radio" name="q3" value="Incremental Model"> Incremental Model</label><br>
                <label><input type="radio" name="q3" value="Spiral Model"> Spiral Model</label><br>
                <label><input type="radio" name="q3" value="All of the above"> All of the above</label>
            </div>
            <div class="question">
                <p>4. What is Agile methodology known for?</p>
                <label><input type="radio" name="q4" value="Strict adherence to project plans"> Strict adherence to project plans</label><br>
                <label><input type="radio" name="q4" value="Frequent inspection and adaptation"> Frequent inspection and adaptation</label><br>
                <label><input type="radio" name="q4" value="Long development cycles"> Long development cycles</label><br>
                <label><input type="radio" name="q4" value="Minimized customer feedback"> Minimized customer feedback</label>
            </div>
            <div class="question">
                <p>5. What is the purpose of a version control system?</p>
                <label><input type="radio" name="q5" value="To track changes in source code"> To track changes in source code</label><br>
                <label><input type="radio" name="q5" value="To create user interfaces"> To create user interfaces</label><br>
                <label><input type="radio" name="q5" value="To compile code into binaries"> To compile code into binaries</label><br>
                <label><input type="radio" name="q5" value="To manage project budgets"> To manage project budgets</label>
            </div>
            <div class="question">
                <p>6. What is a primary key in a database?</p>
                <label><input type="radio" name="q6" value="A unique identifier for a record"> A unique identifier for a record</label><br>
                <label><input type="radio" name="q6" value="A foreign key reference"> A foreign key reference</label><br>
                <label><input type="radio" name="q6" value="A temporary data storage"> A temporary data storage</label><br>
                <label><input type="radio" name="q6" value="A method for data encryption"> A method for data encryption</label>
            </div>
            <div class="question">
                <p>7. What is the purpose of a software design pattern?</p>
                <label><input type="radio" name="q7" value="To provide a standard solution to common problems"> To provide a standard solution to common problems</label><br>
                <label><input type="radio" name="q7" value="To define the project schedule"> To define the project schedule</label><br>
                <label><input type="radio" name="q7" value="To manage team communication"> To manage team communication</label><br>
                <label><input type="radio" name="q7" value="To create user documentation"> To create user documentation</label>
            </div>
            <div class="question">
                <p>8. What does the term 'refactoring' mean?</p>
                <label><input type="radio" name="q8" value="Adding new features to the code"> Adding new features to the code</label><br>
                <label><input type="radio" name="q8" value="Improving the structure of existing code"> Improving the structure of existing code</label><br>
                <label><input type="radio" name="q8" value="Removing old features from the code"> Removing old features from the code</label><br>
                <label><input type="radio" name="q8" value="Rewriting the entire application"> Rewriting the entire application</label>
            </div>
            <div class="question">
                <p>9. What does 'DRY' stand for in programming?</p>
                <label><input type="radio" name="q9" value="Don't Repeat Yourself"> Don't Repeat Yourself</label><br>
                <label><input type="radio" name="q9" value="Do Repeat Yourself"> Do Repeat Yourself</label><br>
                <label><input type="radio" name="q9" value="Don't Run Yourself"> Don't Run Yourself</label><br>
                <label><input type="radio" name="q9" value="Do Run Yourself"> Do Run Yourself</label>
            </div>
            <div class="question">
                <p>10. What is Continuous Integration (CI)?</p>
                <label><input type="radio" name="q10" value="Frequent merging of code changes into a shared repository"> Frequent merging of code changes into a shared repository</label><br>
                <label><input type="radio" name="q10" value="Monthly release of new software versions"> Monthly release of new software versions</label><br>
                <label><input type="radio" name="q10" value="A method for encrypting data"> A method for encrypting data</label><br>
                <label><input type="radio" name="q10" value="Creating a single user interface for all platforms"> Creating a single user interface for all platforms</label>
            </div>
            <button type="button" onclick="submitQuiz()">Submit</button>
        </form>
        <div id="result" class="result"></div>
    </div>
    <script>
    function submitQuiz() {
        const form = document.getElementById('quiz-form');
        const correctAnswers = {
            q1: 'Unified Modeling Language',
            q2: 'To define the functional and non-functional requirements',
            q3: 'All of the above',
            q4: 'Frequent inspection and adaptation',
            q5: 'To track changes in source code',
            q6: 'A unique identifier for a record',
            q7: 'To provide a standard solution to common problems',
            q8: 'Improving the structure of existing code',
            q9: 'Don\'t Repeat Yourself',
            q10: 'Frequent merging of code changes into a shared repository'
        };

        const answers = new FormData(form);
        let score = 0;
        let totalQuestions = Object.keys(correctAnswers).length;

        // Check each answer
        for (const [question, answer] of answers.entries()) {
            if (correctAnswers[question] === answer) {
                score++;
            }
        }

        // Display result on the page
        const result = document.getElementById('result');
        result.textContent = `You scored ${score} out of ${totalQuestions}`;

        // Wait for a few seconds, then redirect to a specific link
        setTimeout(function() {
            window.location.href = 'course-details.php?course=Intro%20to%20Software%20Engineering'; // Replace with the desired link
        }, 3000); // 3-second delay before redirect
    }
</script>


</body>
</html>
