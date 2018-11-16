var Quiz = {


    init: () => {

        this.nextButton = document.querySelector('#btn-next');
        this.questionIndex = 0;
        this.questions = document.querySelectorAll('.question');
        this.answers = [];

        this.questionNumber = document.querySelector('#spn-question-number');

        this.questions[this.questionIndex].style.display = 'block';
        
        Quiz.binds();
    },

    binds: () => {

        document.addEventListener('keyup', (e) => {
            if (e.target.classList.contains('open-field')) {
                Quiz.toggleOpenFields(e);
            }
        });

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('alternativeLabel')) {
                Quiz.toggleObjectiveFields();
            }
        })

        this.nextButton.addEventListener('click', Quiz.goToNextQuestion);        
    },

    goToNextQuestion: () =>  {

        this.nextButton.disabled = true;

        this.answers.push(Quiz.getQuestionResponse(this.questions[this.questionIndex]));

        this.questions[this.questionIndex].style.display = 'none';
        this.questionIndex = ++ this.questionIndex;
        
        if (this.questions[this.questionIndex]) {
            Quiz.updateQuestionNumber(this.questionIndex);
            this.questions[this.questionIndex].style.display = 'block';
            this.questions[this.questionIndex].classList.add('fadeInUp');
        } else {
            Quiz.saveAnswers();
            document.querySelector('#thanks-card').style.display = 'block';
            this.nextButton.style.display = 'none';
        }
    },

    toggleOpenFields: (e) => {
        let field = e.target;
        if (field.value.length > 3) {
            this.nextButton.disabled = false;
        } else {
            this.nextButton.disabled = true;
        }
    },

    updateQuestionNumber: (number) => {
        this.questionNumber.innerHTML = number + 1;
    },

    toggleObjectiveFields: (e) => {
        this.nextButton.disabled = false;
    },

    getQuestionResponse: (questionEl) => {
        let obj = {};

        obj.question_id = questionEl.getAttribute('data-question-id');

        if (questionEl.querySelector('.textarea')) {
            obj.response = questionEl.querySelector('.textarea').value;
        } else {
            obj.alternative_id = questionEl.querySelector('input[name=radioAlternative]:checked').value;
        }       

        return obj;
    },

    saveAnswers: () => {

        let data = {
            answer_hash: document.querySelector('#answer-hash').value,
            responses: this.answers
        };

        sendRequest(
            'POST',
            '/quiz',
            data
        );
    }

};


Quiz.init();