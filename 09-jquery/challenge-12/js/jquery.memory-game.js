(function(){

    let images = [
        'miles1.png', 'miles2.png', 'gwen.png', 'noir.png',
        'niidea.png', 'ohara.png'
    ];
    let cards = [];


    const game = {
        flippedCards: [],
        matchedPairs: 0, 
        totalPairs: images.length,
        delayTime: 2000,
        gameTime: 0,    
        timerInterval: null,
        failedPairs: 0,  

        init: function() {
            this.setupGame();
            this.setupRearrangeButton();
			  this.showCardsOnStart();
        
            this.setupTimer();   
            this.setupFailedPairsCounter();
        },
		showCardsOnStart: function() {
            const self = this;
           
            $('.memory-card').off('click');

            $('.memory-card').addClass('flip'); 
            setTimeout(function() {
                $('.memory-card').removeClass('flip'); 
                self.assignClickEvents(); 
            }, this.delayTime); 
        },

        setupGame: function() {
            
            cards = images.concat(images);

           
            this.shuffleCards();

           
            this.drawCards();

            
            this.assignClickEvents();
        },

        shuffleCards: function() {
            cards.sort(() => Math.random() - 0.5);
        },

        drawCards: function() {
            const gameBoard = $('.memory-game');
            gameBoard.empty(); 

            cards.forEach(image => {
                let cardElement = $(`
                    <div class="memory-card" data-card="${image}">
                        <img class="front-face" src="cards/${image}" alt="front-face">
                        <img class="back-face" src="cards/back.png" alt="back-face">
                    </div>
                `);
                gameBoard.append(cardElement);
            });
        },

        assignClickEvents: function() {
            $('.memory-card').off('click').on('click', this.flipCard.bind(this));
        },

        flipCard: function(event) {
            const card = $(event.currentTarget);

            
            if (card.hasClass('flip') || card.hasClass('matched') || this.flippedCards.length === 2) {
                return;
            }

            card.addClass('flip');
            this.flippedCards.push(card);

            if (this.flippedCards.length === 2) {
                setTimeout(this.checkForMatch.bind(this), 500);
            }
        },

        checkForMatch: function() {
            const [firstCard, secondCard] = this.flippedCards;
            const isMatch = firstCard.data('card') === secondCard.data('card');

            if (isMatch) {
                this.disableCards();
            } else {
                this.unflipCards();
            }
        },
		 setupTimer: function() {
            const self = this;
            
            if (this.timerInterval) {
                clearInterval(this.timerInterval);
            }
            this.gameTime = 0; 
            $('#gameTimer').text('00:00'); 

            this.timerInterval = setInterval(function() {
                self.gameTime++;
                const minutes = Math.floor(self.gameTime / 60);
                const seconds = self.gameTime % 60;
                const formattedTime =
                    (minutes < 10 ? '0' : '') + minutes + ':' +
                    (seconds < 10 ? '0' : '') + seconds;
                $('#gameTimer').text(formattedTime);
            }, 1000); 
        },

        
        stopTimer: function() {
            if (this.timerInterval) {
                clearInterval(this.timerInterval);
                this.timerInterval = null;
            }
        },
        disableCards: function() {
            this.flippedCards.forEach(card => card.addClass('matched').off('click'));
            this.flippedCards = [];
            this.matchedPairs++;

            if (this.matchedPairs === this.totalPairs) {
				this.stopTimer(); 
                alert('¡Felicidades, has encontrado todos los pares!');
                
            }
        },

        unflipCards: function() {
            this.flippedCards.forEach(card => card.removeClass('flip'));
            this.flippedCards = [];
			this.failedPairs++; 
			$('#failedPairsCounter').text(this.failedPairs);
        },

      

        setupRearrangeButton: function() {
            $('#rearrangeButton').on('click', this.rearrangeAndShowCards.bind(this));
        },

        rearrangeAndShowCards: function() {
            
            $('#rearrangeButton').prop('disabled', true);
            $('.memory-card').off('click'); 

           
            $('.memory-card').removeClass('flip matched');

            
            this.shuffleCards(); 

            
            this.drawCards(); 

            
            this.flippedCards = [];
            this.matchedPairs = 0;
			  this.failedPairs = 0; 
            $('#failedPairsCounter').text(this.failedPairs); 
            this.stopTimer(); 
            this.setupTimer(); 

            
            this.showAllCardsBriefly();
        },

        showAllCardsBriefly: function() {
            const self = this;
            $('.memory-card').addClass('flip'); 

            setTimeout(function() {
                $('.memory-card').removeClass('flip'); 
                self.assignClickEvents(); 
                $('#rearrangeButton').prop('disabled', false); 
            }, this.delayTime); 
        }
    };

    
    $(document).ready(function() {
        game.init();
    });
})();