/// <reference types="cypress" />

const url = 'http://127.0.0.1:8000/admin'
const email = 'joshuatrinh5262@gmail.com'
const password = '123456789'
describe('Cookies', function() {
    it(' visit page withow Cookies', function() {
        cy.visit(url)
        cy.url().should('eq','http://127.0.0.1:8000/admin/login')
    })
    it(' visit page with Cookies', function() {
        cy.setCookie('joshuatrinh_session','pBk7V2vizJnmyVoFsz6fuSOxjAIgtcHxcW2MRrYJ')
        cy.visit(url)
        cy.url().should('eq','http://127.0.0.1:8000/admin')
    })
})