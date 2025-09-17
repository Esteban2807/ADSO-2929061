import { createAnimations } from "./animations.js"
import { initAudio, playAudio } from "./audio.js"
import { checkControls } from "./controls.js"
import { initSpritesheet } from "./spritesheet.js"

const config = {
    type: Phaser.AUTO,
    width: 256,
    height: 244,
    backgroundColor: '#049cd8',
    parent: 'game',
    physics: {
        default: 'arcade',
        arcade: {
            gravity: {y : 300},
            debug: false
        }
    },
    scene: {
        preload,
        create,
        update
    }
}
new Phaser.Game(config)
function preload () {
    this.load.image(
        'cloud1',
        'assets/scenery/overworld/cloud1.png'
    )
       this.load.image(
        'floorbicks',
        'assets/scenery/overworld/floorbricks.png'
    )
    this.load.image(
        'supermushroom',
        'assets/collectibles/super-mushroom.png'
    )
    this.load.image(
        'pipe1',
        'assets/scenery/pipe1.png'
    )
    this.load.image(
        'block',
        'assets/blocks/overworld/block.png',
    )
    this.load.image(
        'bush',
        'assets/scenery/overworld/bush1.png'
    )
    this.load.image(
        'mountain',
        'assets/scenery/overworld/mountain1.png'
    )
    this.load.image(
        'castle',
        'assets/scenery/castle.png'
    )
    this.load.image(
        'flag-palo',
        'assets/scenery/flag-mast.png'
    )
    this.load.image(
        'flag',
        'assets/scenery/final-flag.png'
    )

    initSpritesheet(this)
    initAudio(this)

    
}
function create () {
    createAnimations(this)

    this.add.image(150, 50, 'cloud1')
        .setOrigin(0, 0)
        .setScale(0.15)
    this.add.image(300, 45, 'cloud1')
        .setOrigin(0, 0)
        .setScale(0.3)
    this.add.image(700, 50, 'cloud1')
        .setOrigin(0, 0)
        .setScale(0.2)
    this.add.image(1000, 45, 'cloud1')
        .setOrigin(0, 0)
        .setScale(0.3)
     this.add.image(1500, 45, 'cloud1')
        .setOrigin(0, 0)
        .setScale(0.3)
    this.add.image(250, config.height - 32 , 'bush')
        .setOrigin(1,1)
        .setScale(0.4)
    this.add.image(1800, config.height - 32 , 'bush')
        .setOrigin(1,1)
        .setScale(0.4)
    this.add.image(120, config.height - 32 , 'castle')
        .setOrigin(1,1)
        .setScale(1.5)
    this.add.image(740, config.height - 32 , 'mountain')
        .setOrigin(1,1)
        .setScale(1.5)
    this.add.image(1500, config.height - 32 , 'mountain')
        .setOrigin(1,1)
        .setScale(1.5)
    this.floor =  this.physics.add.staticGroup()
    this.pipe1 = this.physics.add.staticGroup()
    this.collectibes = this.physics.add.staticGroup()
    this.flag = this.physics.add.staticGroup()


    this.flag 
        .create(1950, config.height - 32 , 'flag-palo')
        .setOrigin(1,1)
        .setSize(16,167)
        .setScale(1)
    this.floor 
        .create(0, config.height - 16, 'floorbicks')
         .setOrigin(0,0.5)
         .refreshBody()
    this.floor
        .create(170, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(290, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(500, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(618, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(800, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(920, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1040, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1220, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1350, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1475, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1540, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1730, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.floor
        .create(1840, config.height - 16, 'floorbicks')
        .setOrigin(0,0.5)
        .refreshBody()
    this.pipe1
        .create(250, config.height - 32, 'pipe1')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(420, config.height - 32, 'pipe1')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(870, config.height - 32, 'pipe1')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1100, config.height - 32, 'pipe1')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1300, config.height - 32, 'pipe1')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1500, config.height - 32, 'pipe1')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(500, config.height - 32, 'block')
        .setOrigin(1,1)
        .setScale(0.5)
        .setAlpha(0)
        .refreshBody()
    this.pipe1
        .create(740, config.height - 32, 'block')
        .setOrigin(1,1)
        .setScale(0.5)
        .setAlpha(0)
        .refreshBody()
    this.pipe1
        .create(620, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(636, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(652, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
      this.pipe1
        .create(958, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
        this.pipe1
        .create(974, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
     this.pipe1
        .create(980, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(996, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1012, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1028, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1044, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
     this.pipe1
        .create(1600, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1616, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1632, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1648, config.height - 70, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1654, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1670, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1686, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.pipe1
        .create(1702, config.height - 100, 'block')
        .setOrigin(1,1)
        .refreshBody()
    this.mario = this.physics.add.sprite(20, 210, 'mario')
        .setOrigin(0, 1)
        .setGravityY(500)
        .setCollideWorldBounds(true)
    this.enemy = this.physics.add.sprite(120, config.height - 30, 'goomba')
        .setOrigin(0,1)
        .setGravityY(500)
        .setVelocityX(-50)
    this.enemy2 = this.physics.add.sprite(360, config.height - 30, 'goomba')
        .setOrigin(0,1)
        .setGravityY(500)
        .setVelocityX(-50)
    this.enemy3 = this.physics.add.sprite(620, config.height - 30, 'goomba')
        .setOrigin(0,1)
        .setGravityY(500)
        .setVelocityX(-50)
    this.enemy4 = this.physics.add.sprite(890, config.height - 30, 'goomba')
        .setOrigin(0,1)
        .setGravityY(500)
        .setVelocityX(-50)
    this.enemy5 = this.physics.add.sprite(1000, config.height - 30, 'goomba')
        .setOrigin(0,1)
        .setGravityY(500)
        .setVelocityX(-50)
    this.enemy6 = this.physics.add.sprite(1400, config.height - 30, 'goomba')
        .setOrigin(0,1)
        .setGravityY(500)
        .setVelocityX(-50)
    this.add.text(1850, config.height - 150, '¡THE END!', {
    fontFamily: 'Pixel',
    fontSize: '32px',
    fill: '#ffffff', // Color blanco
    stroke: '#000000', // Borde negro
    strokeThickness: 2
}).setOrigin(0.5)

    this.enemy.anims.play('goomba-walk', true)
    this.enemy2.anims.play('goomba-walk', true)
    this.enemy3.anims.play('goomba-walk', true)
    this.enemy4.anims.play('goomba-walk', true)
    this.enemy5.anims.play('goomba-walk', true)
    this.enemy6.anims.play('goomba-walk', true)
    this.collectibes.create(150,150,'coin').anims.play('coin-idle', true)
    this.collectibes.create(300,150,'coin').anims.play('coin-idle', true)
    this.collectibes.create(940,config.height - 130,'coin').anims.play('coin-idle', true)
    this.collectibes.create(1000,config.height - 130,'coin').anims.play('coin-idle', true)
    this.collectibes.create(1040,config.height - 130,'coin').anims.play('coin-idle', true)
    this.collectibes.create(200,config.height - 40, 'supermushroom')
    this.physics.add.overlap(this.mario, this.collectibes, collectItem, null, this)
    this.physics.world.setBounds(0,0,2000, config.height)
    this.physics.add.collider(this.mario, this.floor)
    this.physics.add.collider(this.pipe1, this.mario)
    this.physics.add.collider(this.mario , this.enemy,onHitEnemy, null, this )
    this.physics.add.collider(this.enemy, this.floor)
    this.physics.add.collider(this.mario , this.enemy2,onHitEnemy, null, this )
    this.physics.add.collider(this.enemy2,this.pipe1,toumchingPipe,null,this)
    this.physics.add.collider(this.enemy2, this.floor)
    this.physics.add.collider(this.mario , this.enemy3,onHitEnemy, null, this )
    this.physics.add.collider(this.enemy3 ,this.pipe1, toumchingPipe,null,this)
    this.physics.add.collider(this.enemy3, this.floor)
    this.physics.add.collider(this.mario , this.enemy4,onHitEnemy, null, this )
    this.physics.add.collider(this.enemy4,this.pipe1,toumchingPipe,null,this)
    this.physics.add.collider(this.enemy4, this.floor)
    this.physics.add.collider(this.mario , this.enemy5,onHitEnemy, null, this )
    this.physics.add.collider(this.enemy5,this.pipe1,toumchingPipe,null,this)
    this.physics.add.collider(this.enemy5, this.floor)
    this.physics.add.collider(this.mario , this.enemy6,onHitEnemy, null, this )
    this.physics.add.collider(this.enemy6,this.pipe1,toumchingPipe,null,this)
    this.physics.add.collider(this.enemy6, this.floor)
    this.physics.add.collider(this.mario, this.flag, endGame,null,this)
    this.cameras.main.setBounds(0,0,2000, config.height)
    this.cameras.main.startFollow(this.mario)
    this.keys = this.input.keyboard.createCursorKeys()
    
}
function collectItem (mario, item){
    const {texture: {key}} = item
    item.destroy()
    if(key === 'coin') {
        
        playAudio('coin-pickup', this, {volume: 0.2})
        addToScore(100, item, this)
    } else if (key === 'supermushroom'){
        this.physics.world.pause()
        this.anims.pauseAll()
        playAudio('powerup', this, {volume: 0.2})
        mario.anims.play('mario-grown-idle', true)
        let i = 0
        const interval = setInterval(()=>{
            i++
            mario.anims.play(i % 2 === 0
                ?  'mario-grown-idle'
                : 'mario-idle'
            )
        }, 100)
        mario.isBlocked = true
        mario.isGrown = true

        setTimeout(() => {
            mario.setDisplaySize(18,32)
            mario.body.setSize(18,32)
            mario.isBlocked = false
            clearInterval(interval)
            this.physics.world.resume()
            this.anims.resumeAll()

        }, 1000);
    }
    
}
function endGame(){
    playAudio('win', this, {volume: 0.3})
    setTimeout(() => {
    this.scene.restart()
    }, 5000);    

}
function addToScore (scoreToAdd, origin, game){ 
    const scoreText = game.add.text(
        origin.x,
        origin.y,
        scoreToAdd,
        {
            fontFamily: 'pixel',
            fontSize: config.width / 40
        }
    )
    game.tweens.add({
        targets: scoreText,
        duration: 500,
        y: scoreText.y - 20,
        onComplete: () => {
            game.tweens.add({
                targets: scoreText,
                duration: 100,
                alpha: 0,
                onComplete: () => {
                    scoreText.destroy()
                }
            })
        }
})
}

function onHitEnemy (mario,enemy) {
    if(mario.body.touching.down && enemy.body.touching.up){
        enemy.anims.play('goomba-hurt', true)
        enemy.setVelocityX(0)
        mario.setVelocityY(-200)
        playAudio('goomba-stomp', this)
        addToScore(200, enemy, this)
        setTimeout(() => {
            enemy.destroy()     
        }, 300);
    } else if (mario.isGrown){
        this.physics.world.pause()
        this.anims.pauseAll()
        playAudio('powerdown', this)
        mario.anims.play('mario-idle', true)
        let i = 1
        const interval = setInterval(()=>{
            i++
            mario.anims.play(i % 2 === 0
                ?  'mario-grown-idle'
                : 'mario-idle'
            )
        }, 100)
        mario.isGrown = false
        mario.isBlocked = true

        setTimeout(() => {
            mario.setDisplaySize(18,16)
            mario.body.setSize(18,16)
            mario.isBlocked = false
            clearInterval(interval)
            this.physics.world.resume()
            this.anims.resumeAll()

        }, 1000);
    } else{
        killMario(this)
    }
}
function toumchingPipe (enemy,pipe1) {
    if(enemy.body.touching.left && pipe1.body.touching.right){
        enemy.setVelocityX(50)
    } else if(enemy.body.touching.right && pipe1.body.touching.left){
        enemy.setVelocityX(-50)
    }
}

function update () {
    checkControls(this)
    const { mario } = this
    if(mario.y >= config.height) {
        killMario(this)
    }
}

function killMario (game) {
    const {mario, scene} = game
    if(mario.isDead) return
    mario.isDead = true
    mario.setVelocityX(0)
        mario.anims.play('mario-dead')
        mario.setCollideWorldBounds(false)
        playAudio('dead', game, {volume: 0.2})
        mario.body.checkCollision.none = true
        setTimeout(() => {
            mario.setVelocityY(-350)
        }, 100)
        setTimeout(() => {
            scene.restart()
        }, 1500)
}