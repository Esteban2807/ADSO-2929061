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

        init: function() {
            this.setupGame();
            this.setupRearrangeButton(); // Nueva llamada para configurar el botón
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

        disableCards: function() {
            this.flippedCards.forEach(card => card.addClass('matched').off('click'));
            this.flippedCards = [];
            this.matchedPairs++;

            if (this.matchedPairs === this.totalPairs) {
                alert('¡Felicidades, has encontrado todos los pares!');
                // Aquí podrías añadir lógica para reiniciar el juego automáticamente o un botón de reinicio
            }
        },

        unflipCards: function() {
            this.flippedCards.forEach(card => card.removeClass('flip'));
            this.flippedCards = [];
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