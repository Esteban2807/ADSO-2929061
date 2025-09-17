const MARIO_ANIMATIONS = {
    grown: {
        idle: 'mario-grown-idle',
        walk: 'mario-grown-walk',
        jump: 'mario-grown-jump',
        down: 'mario-down'
    },
    normal: {
        idle: 'mario-idle',
        walk: 'mario-walk',
        jump: 'mario-jump',
        down: 'mario-idle'
    }
}
export function checkControls ({mario, keys}) {
    const isMarioTouchingFloor = mario.body.touching.down
    const isRightKeyDown = keys.right.isDown
    const isLeftKeyDown = keys.left.isDown
    const isUpKeyDown = keys.up.isDown
    const isDownKeyDown = keys.down.isDown

    if(mario.isDead) return
    if(mario.isBlocked) return
    const marioAnimations = mario.isGrown
        ? MARIO_ANIMATIONS.grown
        : MARIO_ANIMATIONS.normal
    if(isLeftKeyDown){
        mario.x -= 2
        isMarioTouchingFloor && mario.anims.play(marioAnimations.walk, true)
        mario.flipX = true
    } else if (isRightKeyDown){
        mario.x += 2
        isMarioTouchingFloor && mario.anims.play(marioAnimations.walk, true)
        mario.flipX = false
    } else if(isDownKeyDown) {
       isMarioTouchingFloor && mario.anims.play(marioAnimations.down,true)
    }
     else if(isMarioTouchingFloor){
        mario.anims.play(marioAnimations.idle, true)
    } 

    if (isUpKeyDown && isMarioTouchingFloor){
        mario.setVelocityY(-300)
        mario.anims.play(marioAnimations.jump, true)
    }
}