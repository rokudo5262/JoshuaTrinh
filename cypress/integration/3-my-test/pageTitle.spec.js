/// <reference types="cypress" />

describe('Page Title', function() {
    const email = 'joshuaTrinh5262@gmail.com'
    const password = '123456789'
    it('Page Title Veryfy - True', function() {
        cy.login(email,password)
        cy.title().should('eq','JoshuaTrinh')
    })
    it('Page Title Veryfy - False', function() {
        cy.login(email,password)
        cy.title().should('eq','Laravel')
    })
})