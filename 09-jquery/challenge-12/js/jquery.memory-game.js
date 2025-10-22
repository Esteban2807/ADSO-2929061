(function(){
    // Array de imágenes y un array para las cartas que se van a usar en el juego
    let images = [
        'miles1.png', 'miles2.png', 'gwen.png', 'noir.png',
        'niidea.png', 'ohara.png'
    ];
    let cards = []; // Este será nuestro array de objetos carta para el juego

    // Objeto 'game' para encapsular la lógica del juego
    const game = {
        flippedCards: [], // Almacena las 2 cartas volteadas actualmente
        matchedPairs: 0,  // Contador de pares encontrados
        totalPairs: images.length, // Total de pares esperados
        delayTime: 2000, // Tiempo en milisegundos para mostrar todas las cartas
        gameTime: 0,      // Nuevo: Almacena el tiempo en segundos
        timerInterval: null, // Nuevo: Para almacenar el ID del intervalo del temporizador
        failedPairs: 0,   // Nuevo: Contador de pares fallidos

        init: function() {
            this.setupGame();
            this.setupRearrangeButton(); // Nueva llamada para configurar el botón
			  this.showCardsOnStart(); // <-- AÑADE ESTA LÍNEA
            // También inicia los contadores si los quieres desde el inicio
            this.setupTimer();     // <-- Nueva llamada para el temporizador
            this.setupFailedPairsCounter(); // <-- Nueva llamada para el contador de fallos
        },
		showCardsOnStart: function() {
            const self = this;
            // Deshabilitar los clicks mientras las cartas se muestran
            $('.memory-card').off('click');

            $('.memory-card').addClass('flip'); // Voltear todas las cartas
            setTimeout(function() {
                $('.memory-card').removeClass('flip'); // Volver a voltearlas
                self.assignClickEvents(); // Re-habilitar los eventos de click
            }, this.delayTime); // Usa el delayTime configurado (2000ms = 2 segundos)
        },

        setupGame: function() {
            // Duplica las imágenes para tener pares
            cards = images.concat(images);

            // Mezcla las cartas
            this.shuffleCards();

            // Dibuja las cartas en el DOM
            this.drawCards();

            // Asigna eventos de click a las cartas
            this.assignClickEvents();
        },

        shuffleCards: function() {
            cards.sort(() => Math.random() - 0.5);
        },

        drawCards: function() {
            const gameBoard = $('.memory-game');
            gameBoard.empty(); // Limpiar el tablero antes de dibujar

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

            // Si la carta ya está volteada o emparejada, no hacer nada
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
            // Limpia cualquier temporizador anterior si el juego se reinicia
            if (this.timerInterval) {
                clearInterval(this.timerInterval);
            }
            this.gameTime = 0; // Reinicia el tiempo
            $('#gameTimer').text('00:00'); // Muestra el tiempo inicial

            this.timerInterval = setInterval(function() {
                self.gameTime++;
                const minutes = Math.floor(self.gameTime / 60);
                const seconds = self.gameTime % 60;
                const formattedTime =
                    (minutes < 10 ? '0' : '') + minutes + ':' +
                    (seconds < 10 ? '0' : '') + seconds;
                $('#gameTimer').text(formattedTime);
            }, 1000); // Actualiza cada segundo
        },

        // Función para detener el temporizador (llamada cuando el juego termina)
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
				this.stopTimer(); // <-- DETENER EL TEMPORIZADOR AL GANAR
                alert('¡Felicidades, has encontrado todos los pares!');
                // Aquí podrías añadir lógica para reiniciar el juego automáticamente o un botón de reinicio
            }
        },

        unflipCards: function() {
            this.flippedCards.forEach(card => card.removeClass('flip'));
            this.flippedCards = [];
			this.failedPairs++; // <-- INCREMENTAR PARES FALLIDOS AQUI
			$('#failedPairsCounter').text(this.failedPairs);
        },

        // --- NUEVAS FUNCIONES ---

        setupRearrangeButton: function() {
            $('#rearrangeButton').on('click', this.rearrangeAndShowCards.bind(this));
        },

        rearrangeAndShowCards: function() {
            // Deshabilitar el botón temporalmente para evitar clicks múltiples
            $('#rearrangeButton').prop('disabled', true);
            $('.memory-card').off('click'); // Deshabilitar clicks en cartas

            // 1. Quitar clases de flip y matched de todas las cartas
            $('.memory-card').removeClass('flip matched');

            // 2. Mezclar las cartas de nuevo (el array 'cards')
            this.shuffleCards(); // Reutilizamos la función de mezclar

            // 3. Redibujar las cartas en el DOM con el nuevo orden
            this.drawCards(); // Reutilizamos la función de dibujar

            // Resetear el estado del juego
            this.flippedCards = [];
            this.matchedPairs = 0;
			  this.failedPairs = 0; // <-- RESETEAR PARES FALLIDOS AQUI
            $('#failedPairsCounter').text(this.failedPairs); // Actualizar el display
            this.stopTimer(); // Detener el temporizador anterior
            this.setupTimer(); // Iniciar un nuevo temporizador

            // 4. Mostrar todas las cartas brevemente
            this.showAllCardsBriefly();
        },

        showAllCardsBriefly: function() {
            const self = this;
            $('.memory-card').addClass('flip'); // Voltear todas las cartas

            setTimeout(function() {
                $('.memory-card').removeClass('flip'); // Volver a voltearlas
                self.assignClickEvents(); // Re-habilitar los eventos de click
                $('#rearrangeButton').prop('disabled', false); // Habilitar el botón
            }, this.delayTime); // Usa el delayTime configurado
        }
    };

    // Inicializa el juego cuando el DOM esté listo
    $(document).ready(function() {
        game.init();
    });

})(); // Fin del closure anónimo