
function games(url) {

    //$('.btn.btn-dark').tooltip('show')
    //$('.btn.btn-dark').tooltip('toggle')
   //$('.btn.btn-dark').tooltip('hide')

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    class Tablegame {
        constructor(tr, td, offset = 0, id = "1", field = "One", type='default') {
            this.tr = tr
            this.td = td
            this.offset = offset
            this.id = id
            this.field = field
            this.type = type
        }   
    }

    function elt(name, attrs = {}, ...children) {
        const dom = document.createElement(name)
        
        
        for (let attr of Object.keys(attrs)) {
            
            dom.setAttribute(attr, attrs[attr])
    
        }
        
        for (let child of children) {
            dom.append(child)
        }
        
        return dom
    }
    
    function checkNumber(num) {
        if (num.toString().length == 1) {
            return '0' + num
        } 
        return num
    }
    
    function createGrid(parent, obj_table) {
        const table = elt('table', {class: 'table table-bordered'})
        let count = 1
        const label = function (innerNumber) {
            return elt('label',{for: `ticket${obj_table.id}_field${obj_table.field}${count}`}, innerNumber)
        }

        for (let i = 0; i < obj_table.tr; i++) {
            const tr = elt('tr')
            for (let j = 0; j < obj_table.td; j++) {
                const td = elt('td', {}, elt('input', {
                    type: 'checkbox',
                    name: `ticket${obj_table.id}_field${obj_table.field}${count}`,
                    id: `ticket${obj_table.id}_field${obj_table.field}${count}`,
                    value: `${checkNumber(count)}`,
                }), obj_table.type == 'default' ? label(count) : label(i+1))
                tr.append(td)
                count += 1
            }
            table.append(tr)
        }

        const td = [...table.querySelectorAll('td')]
        td.forEach((item, index) => {
            if (index + 1 > td.length - obj_table.offset) {
                item.remove()
 
            }
        })
        
        parent.append(table)
    }

    (function() {
        const engineClick = (option) => {
            const fieldOne = option.fieldOne
            const fieldTwo = option.fieldTwo
            const itog = option.itog
            const inputsOne = [...fieldOne.querySelectorAll('input')]
            const inputsTwo = [...fieldTwo.querySelectorAll('input')]
            let countOne = 0
            let countTwo = 0
            let activeNumberOne, activeNumberTwo
            const countActiveCell = option.countActiveCell
            const allCell = option.allCell

            function rnd(feild, type) {
                const inputs = feild
                inputs.forEach(item => {
                    item.checked = false
                })

                const arrInedexRnd = []
                let rnd, flagRandom = null
                for (let i = 0; i < countActiveCell; i++) {
                    if (type == 'rnd') { 
                        do {
                            flagRandom = true
                            rnd = Math.floor(Math.random() * allCell) 
                            if (arrInedexRnd.includes(rnd))  flagRandom = false
                        } while (!flagRandom)
                        
                        arrInedexRnd.push(rnd)
                        inputs[arrInedexRnd[i]].checked = true
                    }
                    if (type == 'odd') {
                        do {
                            flagRandom = true
                            rnd = Math.floor(Math.random() * allCell) 
                            if (arrInedexRnd.includes(rnd) || rnd % 2 != 0)  flagRandom = false
                        } while (!flagRandom)
                        arrInedexRnd.push(rnd)
                        inputs[arrInedexRnd[i]].checked = true
                    }
                    if (type == 'even') {
                        do {
                            flagRandom = true
                            rnd = Math.floor(Math.random() * allCell) 
                            if (arrInedexRnd.includes(rnd) || rnd % 2 == 0)  flagRandom = false
                        } while (!flagRandom)
                        arrInedexRnd.push(rnd)
                        inputs[arrInedexRnd[i]].checked = true
                    }
                }
            }

            function random(type) {
                rnd(inputsOne, type)
                rnd(inputsTwo, type)
                countOne = 4
                countTwo = 4
                analiz()
                console.log(countOne, countTwo)
            }

            console.log(countOne, countTwo)

            inputsOne.forEach(input => {
                input.addEventListener('click', function() {
                    if (this.checked == true) {
                        countOne++
                    } else {
                        countOne--
                    }

                    analiz()
                    console.log("countOne", countOne)
                })
            })

            inputsTwo.forEach(input => {
                input.addEventListener('click', function() {
                    if (this.checked == true) {
                        countTwo++
                    } else {
                        countTwo--
                    }

                    analiz()
                    console.log("countTwo", countTwo)
                })
            })


            function analiz() {
                if (countOne !== null) {activeNumberOne = countOne}
                if (countTwo !== null) {activeNumberTwo = countTwo}
        
                console.log(activeNumberOne, activeNumberTwo)
        
                function ifes(num1,num2, place, summ) {
                    if (activeNumberOne == num1 && activeNumberTwo == num2) {
                        place.innerHTML = summ 
                    }
                }
                switch(activeNumberTwo) {
                    case 1:
                        [0, 0, 0, 0, 1, 5, 15, 35, 70, 126].forEach((el, index) => {
                            ifes(index, activeNumberTwo, itog, 0)
                        })
                    break
                    case 2:
                        [0, 0, 0, 0, 1, 5, 15, 35, 70, 126].forEach((el, index) => {
                            ifes(index, activeNumberTwo, itog,0)
                        })
                    break
                    case 3:
                        [0, 0, 0, 0, 1, 5, 15, 35, 70, 126].forEach((el, index) => {
                            ifes(index, activeNumberTwo, itog, 0)
                        })
                    break
                    case 4:
                        [0, 0, 0, 0, 1, 5, 15, 35, 70, 126].forEach((el, index) => {
                            ifes(index, activeNumberTwo, itog, el * 200)
                        })
                    break
                    case 5:
                        [0, 0, 0, 0, 5, 25, 75, 175, 350, 126, 630].forEach((el, index,) => {
                            ifes(index, activeNumberTwo, itog, el * 200)
                        })
                    break
                    case 6:
                        [0, 0, 0, 0, 15, 75, 225, 525, 1050, 2000].forEach((el, index,) => {
                            ifes(index, activeNumberTwo, itog, el * 200)
                        })
                    break
                    case 7:
                        [0, 0, 0, 0, 35, 175, 525, 1225, 2000].forEach((el, index,) => {
                            ifes(index, activeNumberTwo, itog, el * 200)
                        })
                    break
                    case 8:
                        [0, 0, 0, 0, 70, 350, 1050, 2000].forEach((el, index,) => {
                            ifes(index, activeNumberTwo, itog, el * 200)
                        })
                    break
                    case 9:
                        [0, 0, 0, 0, 126, 630, 2000].forEach((el, index,) => {
                            ifes(index, activeNumberTwo, itog, el * 200)
                        })
                    break
                }
            }

            return {
                random
            }
        }

        window.engineClick = engineClick;
    })()


    if (url == '/four-of-twenty') {
        (function game4_20() {
            //console.dir(document.body.style.background ='#fe8933')
            const $root = document.querySelector('#main')

            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $zoneHeader = $blocksTicket.querySelector('.zone-header')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')
            const $sum = $root.querySelector('#sum')
            const $validTicketNumber = $root.querySelector('#validTicketNumber')

            const arrBtns = [...$quickPanel.children]
 

            const createTicet = (function(){
                let count = 1
                return function(parentOne, parentTwo) {
                    createGrid(parentOne, new Tablegame(5, 4, 0, count))
                    createGrid(parentTwo, new Tablegame(5, 4, 0, count, "Two"))
                    $validTicketNumber.value = count
                    return count++
                }
            }())

            createTicet($parentfieldOne, $parentfieldTwo)
            const gameTest = engineClick({fieldOne: $parentfieldOne, fieldTwo: $parentfieldTwo, 
                                            itog: $sum,
                                          countActiveCell: 4, allCell: 20})

            arrBtns.forEach((item , index, arr) => {
                switch(index) {
                    case 0: 
                        item.addEventListener('click', () => {
                            gameTest.random('rnd')
                        }) 
                    break
                    case 1:
                        item.addEventListener('click', () => {
                            gameTest.random('even')
                        }) 
                    break
                    case 2:
                        item.addEventListener('click', () => {
                            gameTest.random('odd')
                        }) 
                    break
                    case 3:
                        item.addEventListener('click', () => {
                            gameTest.random()
                        }) 
                    break
                }
            })

            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        
                const quickPanel = $quickPanel.cloneNode(true)

                const arrBtns = [...quickPanel.children]

                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, "Поле 1"))
                const fieldTwo = elt('div', {class: 'zone-two'}, elt('div', {class: 'zone-header'}, "Поле 2"))
                createTicet(fieldOne, fieldTwo)
                const gameTest = engineClick({fieldOne: fieldOne, fieldTwo: fieldTwo, 
                    itog: $sum,
                  countActiveCell: 4, allCell: 20})
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne, fieldTwo)
        
                //
                // elem.append(parentfieldOne, parentfieldTwo)
                // block.append(elem)
        
                arrBtns.forEach((item , index, arr) => {
                    switch(index) {
                        case 0: 
                            item.addEventListener('click', () => gameTest.random('rnd'))  
                        break
                        case 1:
                            item.addEventListener('click', () => random(fieldOne, 'even', 4, 20)) 
                            item.addEventListener('click', () => random(fieldTwo, 'even', 4, 20)) 
                        break
                        case 2:
                            item.addEventListener('click', () => random(fieldOne, 'odd', 4, 20)) 
                            item.addEventListener('click', () => random(fieldTwo, 'odd', 4, 20)) 
                        break
                        case 3:
                            item.addEventListener('click', () => random(fieldOne)) 
                            item.addEventListener('click', () => random(fieldTwo)) 
                        break
                    }
                })

                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })

            valid($parentfieldOne, $parentfieldTwo, $sum, 0 )

        })()
    }

    if (url == '/five-of-threety-six') {
        (function game5_36() {
    
            const $root = document.querySelector('#main')
            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $zoneHeaders = $blocksTicket.querySelector('.zone-header')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')
            
            const $validTicketNumber = $root.querySelector('#validTicketNumber')

            const arrBtns = [...$quickPanel.children]

            const createTicet = (function(){
                let count = 1
                return function(parentOne, parentTwo) {
                    createGrid(parentOne, new Tablegame(5, 8, 4, count))
                    createGrid(parentTwo, new Tablegame(1, 4, 0, count, "Two"))
                    $validTicketNumber.value = count
                    console.dir($validTicketNumber)
                    return count++
                }
            }())
        
            createTicet($parentfieldOne, $parentfieldTwo)
        
            arrBtns.forEach((item , index) => {
                switch(index) {
                    case 0: 
                        item.addEventListener('click', () => {
                            random($parentfieldOne, 'rnd', 5, 36)
                        })
                        item.addEventListener('click', () => random($parentfieldTwo, 'rnd', 1, 4)) 
                    break
                    case 1:
                        item.addEventListener('click', () => random($parentfieldOne, 'even', 5, 36)) 
                        item.addEventListener('click', () => random($parentfieldTwo, 'even', 1, 4)) 
                    break
                    case 2:
                        item.addEventListener('click', () => random($parentfieldOne, 'odd', 5, 36)) 
                        item.addEventListener('click', () => random($parentfieldTwo, 'odd', 1, 4)) 
                    break
                    case 3:
                        item.addEventListener('click', () => random($parentfieldOne)) 
                        item.addEventListener('click', () => random($parentfieldTwo)) 
                    break
                }
            })


            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        

                const quickPanel = $quickPanel.cloneNode(true)
        
                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, 'Поле1'))
                const fieldTwo = elt('div', {class: 'zone-two'}, elt('div', {class: 'zone-header'}, 'Поле2'))
                createTicet(fieldOne, fieldTwo)
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne, fieldTwo)
                
                const arrBtns = [...quickPanel.children]
                //
                // elem.append(parentfieldOne, parentfieldTwo)
                // block.append(elem)
                arrBtns.forEach((item , index) => {
                    switch(index) {
                        case 0: 
                            item.addEventListener('click', () => random(fieldOne, 'rnd', 5, 36)) 
                            item.addEventListener('click', () => random(fieldTwo, 'rnd', 1, 4)) 
                        break
                        case 1:
                            item.addEventListener('click', () => random(fieldOne, 'even', 5, 36)) 
                            item.addEventListener('click', () => random(fieldTwo, 'even', 1, 4)) 
                        break
                        case 2:
                            item.addEventListener('click', () => random(fieldOne, 'odd', 5, 36)) 
                            item.addEventListener('click', () => random(fieldTwo, 'odd', 1, 4)) 
                        break
                        case 3:
                            item.addEventListener('click', () => random(fieldOne)) 
                            item.addEventListener('click', () => random(fieldTwo))
                        break
                    }
                })
        
                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })
        }())
    }

    if (url == '/seven-of-fourty-nine') {
        (function game7_49() {
            const $root = document.querySelector('#main')
            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $zoneHeaders = $blocksTicket.querySelector('.zone-headers')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')

            const $validTicketNumber = $root.querySelector('#validTicketNumber')

            const arrBtns = [...$quickPanel.children]
            
            const createTicet = (function(){
                let count = 1
                return function(parentOne) {
                    createGrid(parentOne, new Tablegame(5, 10, 1, count))
                    $validTicketNumber.value = count
                    console.dir($validTicketNumber)
                    return count++
                }
            }())
        
            createTicet($parentfieldOne, $parentfieldTwo)
        
            arrBtns.forEach((item , index, arr) => {
                switch(index) {
                    case 0: 
                        item.addEventListener('click', () => random($parentfieldOne, 'rnd', 7, 49)) 
                        item.addEventListener('click', () => random($parentfieldTwo, 'rnd', 7, 49)) 
                    break
                    case 1:
                        item.addEventListener('click', () => random($parentfieldOne, 'even', 7, 49)) 
                        item.addEventListener('click', () => random($parentfieldTwo, 'even', 7, 49)) 
                    break
                    case 2:
                        item.addEventListener('click', () => random($parentfieldOne, 'odd', 7, 49)) 
                        item.addEventListener('click', () => random($parentfieldTwo, 'odd', 7, 49)) 
                    break
                    case 3:
                        item.addEventListener('click', () => random($parentfieldOne)) 
                        item.addEventListener('click', () => random($parentfieldTwo)) 
                    break
                }
            })

            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        
                //const zoneHeaders = $zoneHeaders.cloneNode(true)
                const quickPanel = $quickPanel.cloneNode(true)
        
                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, "Поле 1"))
                createTicet(fieldOne)
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne)
        
                //
                // elem.append(parentfieldOne, parentfieldTwo)
                // block.append(elem)
        
        
                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })
        })()
    }

    if (url == '/six-of-fourty-five') {
        (function game6_45() {
            const $root = document.querySelector('#main')
            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $zoneHeaders = $blocksTicket.querySelector('.zone-headers')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')
            const $validTicketNumber = $root.querySelector('#validTicketNumber')
            
            
            const createTicet = (function(){
                let count = 1
                return function(parentOne) {
                    createGrid(parentOne, new Tablegame(5, 10, 5, count))
                    $validTicketNumber.value = count
                    return count++
                }
            }())
        
            createTicet($parentfieldOne, $parentfieldTwo)
        
            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        
                const quickPanel = $quickPanel.cloneNode(true)
        
                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, 'Поле 1'))
                createTicet(fieldOne)
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne)
        
                //
                // elem.append(parentfieldOne, parentfieldTwo)
                // block.append(elem)
        
        
                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })
        })()
    }

    if (url == '/twenteen-of-twenty-four') {
        (function game12_24() {

            const $root = document.querySelector('#main')
            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $zoneHeaders = $blocksTicket.querySelector('.zone-headers')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')
            const $validTicketNumber = $root.querySelector('#validTicketNumber')
            
            
            const createTicet = (function(){
                let count = 1
                return function(parentOne) {
                    createGrid(parentOne, new Tablegame(4, 6, 0, count))
                    $validTicketNumber.value = count
                    return count++
                }
            }())
        
            createTicet($parentfieldOne)
        
            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        
                const quickPanel = $quickPanel.cloneNode(true)
        
                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, "Поле 1"))
                createTicet(fieldOne)
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne)
        
                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })
        })()
    }

    if (url == '/rapido') {
        (function rapido() {

            const $root = document.querySelector('#main')
            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')
            const $validTicketNumber = $root.querySelector('#validTicketNumber')
            
            const createTicet = (function(){
                let count = 1
                return function(parentOne, parentTwo) {
                    createGrid(parentOne, new Tablegame(2, 10, 0, count))
                    createGrid(parentTwo, new Tablegame(1, 4, 0, count, 'Two'))
                    $validTicketNumber.value = count
                    return count++
                }
            }())
        
            createTicet($parentfieldOne, $parentfieldTwo)
        
            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        
                const quickPanel = $quickPanel.cloneNode(true)
        
                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, "Поле 1"))
                const fieldTwo = elt('div', {class: 'zone-two'}, elt('div', {class: 'zone-header'}, "Поле 2"))
                createTicet(fieldOne, fieldTwo)
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne, fieldTwo)
        
                //
                // elem.append(parentfieldOne, parentfieldTwo)
                // block.append(elem)
        
        
                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })
        })()
    }

    if (url == '/top-4') {
        (function rapido() {

            const $root = document.querySelector('#main')
            const $blocksTicket = $root.querySelector('.blocks-ticket')
            const $btnAddTicket = $root.querySelector('#addTicket') 
            const $parentfieldOne = $blocksTicket.querySelector('.zone-one')
            const $parentfieldTwo = $blocksTicket.querySelector('.zone-two')
            const $zoneHeaders = $blocksTicket.querySelector('.zone-headers')
            const $quickPanel = $blocksTicket.querySelector('.quick-panel')
            const $validTicketNumber = $root.querySelector('#validTicketNumber')
            
            const createTicet = (function(){
                let count = 1
                return function(parentOne) {
                    createGrid(parentOne, new Tablegame(9, 3, 0, count,'One', 'num'))
                    alidTicketNumber.value = count
                    return count++
                }
            }())
        
            createTicet($parentfieldOne, $parentfieldTwo)
        
            $btnAddTicket.addEventListener('click', function(e) {
                e.preventDefault()
        
                const quickPanel = $quickPanel.cloneNode(true)
        
                const fieldOne = elt('div', {class: 'zone-one'}, elt('div', {class: 'zone-header'}, 'Поле 1'))
                createTicet(fieldOne)
                const zoneWorker = elt('div', {class: 'zone-worker'}, fieldOne)
        
                const blockTicket = elt('div', {class: 'block-ticket card'}, zoneWorker, quickPanel)
                
                $blocksTicket.append(blockTicket)
            })
        })()
    }
}



function ticket() {
    $('[data-spy="scroll"]').each(function () {
        var $spy = $(this).scrollspy('refresh')
      })
}

function valid() {
    const $select = document.querySelector('#inputGroupSelect01')
    const $input = document.querySelector('input.hide')
    const $valid = document.getElementById('valid')
    
    $select.onchange = () => {
        const arrOptions = [...$select.options]
        $input.classList.add('hide')
        arrOptions.forEach(item => {
            if (item.selected) {
                if (item.id == 'game-4_20') {
                    $valid.value = 1
                    $input.classList.remove('hide')
                }
                if (item.id == 'game-5_36') {
                    $valid.value = 2
                    $input.classList.remove('hide')
                }
                if (item.id == 'game-7_49') {
                    $valid.value = 3
                }
                if (item.id == 'game-6_45') {
                    $valid.value = 4
                }
                if (item.id == 'game-12_24') {
                    $valid.value = 5
                }
                if (item.id == 'game-rapido') {
                    $valid.value = 6
                    $input.classList.remove('hide')
                }
            }
        })
    }
}



class Routing {
    constructor(url, fn) {
        this.url = url
        this.fn = fn
        this.start()
    }

    start() {
        if (document.location.pathname == this.url) {
            this.fn(this.url)
        }
    }
}

new Routing('/top-4', games)
new Routing('/rapido', games)
new Routing('/twenteen-of-twenty-four', games)
new Routing('/six-of-fourty-five', games)
new Routing('/seven-of-fourty-nine', games)
new Routing('/five-of-threety-six', games)
new Routing('/four-of-twenty', games)
new Routing('/ticket', ticket)
new Routing('/valid', valid)
