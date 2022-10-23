document.addEventListener('DOMContentLoaded', () => {

    const width = 10
    let timer
    const grid = document.querySelector('.tetris-bg')
    let blocks = document.querySelectorAll('.tetris-bg div')
    const points = document.querySelector('#score')
    const start = document.querySelector('#start')

    const blockColours = [
        'aqua',
        'purple',
        'orange',
        'blue',
        'red',
        'limegreen'
    ]

    const pieceL = [
        [1, width+1, width*2+1, 2],
        [width, width+1, width+2, width*2+2],
        [1, width+1, width*2+1, width*2],
        [width, width*2, width*2+1, width*2+2]
    ]
    
    const pieceS = [
        [0, width, width+1, width*2+1],
        [width+1, width+2, width*2, width*2+1],
        [0, width,width+1, width*2+1],
        [width+1, width+2, width*2, width*2+1]
    ]

    const pieceZ = [
        [2, width+2, width+1, width*2+1],
        [width, width+1, width*2+1, width*2+2],
        [2, width+2, width+1, width*2+1],
        [width, width+1, width*2+1, width*2+2]
    ]
    
    const pieceT = [
        [1,width,width+1,width+2],
        [1,width+1,width+2,width*2+1],
        [width,width+1,width+2,width*2+1],
        [1,width,width+1,width*2+1]
    ]
    
    const pieceO = [
        [0,1,width,width+1],
        [0,1,width,width+1],
        [0,1,width,width+1],
        [0,1,width,width+1]
    ]
    
    const pieceI = [
        [1,width+1,width*2+1,width*3+1],
        [width,width+1,width+2,width+3],
        [1,width+1,width*2+1,width*3+1],
        [width,width+1,width+2,width+3]
    ]
    
    const gamePieces = [pieceL,pieceZ,pieceS,pieceT,pieceO,pieceI]

    let currentPosition = 4
    let currentRotation = 0

    let randomBlock = Math.floor(Math.random()*gamePieces.length)
    let currentBlock = gamePieces[randomBlock][currentRotation]

    function controls(e) {
        if (e.keyCode === 37) {
            moveLeft()
        }
        else if (e.keyCode === 39) {
            moveRight()
        }
        else if (e.keyCode === 40) {
            moveDown()
        }
        else if (e.keyCode === 38) {
            rotateGamePiece()
        }
    }

    document.addEventListener('keyup', controls)

    function draw() {
        currentBlock.forEach(index => {
            blocks[currentPosition + index].classList.add('tetromino')
            blocks[currentPosition + index].style.backgroundColor = blockColours[randomBlock]
        })
    }
    
    function undraw() {
        currentBlock.forEach(index => {
          blocks[currentPosition + index].classList.remove('tetromino')
          blocks[currentPosition + index].style.backgroundColor = ''

        })
    }

    function moveDown() {
        undraw()
        currentPosition += width
        draw()
        inPlace()
    }

    start.addEventListener('click', () => {
        if (timer) {
            clearInterval(timer)
            timer = null
        }
        else{
            draw()
            timer = setInterval(moveDown, 500)
        }
    })

    function inPlace() {
        if(currentBlock.some(index => blocks[currentPosition + index + width].classList.contains('block'))) {
          currentBlock.forEach(index => blocks[currentPosition + index].classList.add('block'))
          randomBlock = Math.floor(Math.random()*gamePieces.length)
          currentBlock = gamePieces[randomBlock][currentRotation]
          currentPosition = 4
          draw()
          addingScore()
          endGame()
        }
    }

    function moveLeft() {
        undraw()
        const endOfGridLeft = currentBlock.some(index => (currentPosition + index) % width === 0)
        if(!endOfGridLeft) currentPosition -=1
        if(currentBlock.some(index => blocks[currentPosition + index].classList.contains('block'))) {
            currentPosition +=1
        }
        draw()
    }

    function moveRight() {
        undraw()
        const endOfGridRight = currentBlock.some(index => (currentPosition + index) % width === width - 1)
        if(!endOfGridRight) currentPosition +=1
        if(currentBlock.some(index => blocks[currentPosition + index].classList.contains('block'))) {
            currentPosition -=1
        }
        draw()
    }
    
    function rotateGamePiece() {
        undraw()
        currentRotation ++
        if (currentRotation === currentBlock.length) {
            currentRotation = 0
        }
        currentBlock = gamePieces[randomBlock][currentRotation]
        draw()
    }

    function addingScore() {
        for (let i = 0; i < 199; i += width) {
          const row = [i, i+1, i+2, i+3, i+4, i+5, i+6, i+7, i+8, i+9]
    
          if(row.every(index => blocks[index].classList.contains('block'))) {
            score += 10
            points.innerHTML = score
            row.forEach(index => {
              blocks[index].classList.remove('block')
              blocks[index].classList.remove('tetromino')
              blocks[index].style.backgroundColor = ''
            })
            const removedRow = blocks[index].splice(i, width)
            blocks = removedRow.concat(blocks)
            blocks.forEach(cell => grid.appendChild(cell))
          }
        }
      }
      function endGame() {
        if(currentBlock.some(index => blocks[currentPosition + index].classList.contains('block'))) {
            points.innerHTML = 'GAMEOVER!'
            clearInterval(timerId)
            undraw()
        }
    }    
})