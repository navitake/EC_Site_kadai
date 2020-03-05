'use strict'

const express = require('express')
const bodyParser = require('body-parser')
const cors = require('cors')

const app = express()
app.use(express.static('public'))
app.use(bodyParser.json())
app.use(cors())

app.get('/test', function (req, res) {
    res.send({
        message: 'Hello world!'
    })
})

app.post('/test', function (req, res) {
    req.send({
        message: req.body.text
    })
})

app.listen(process.env.PORT || 3000)