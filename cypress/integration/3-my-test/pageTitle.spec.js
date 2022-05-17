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
    it('Check dashboard', function() {
        cy.login(email,password)
        cy.contains('Admin').click()
        cy.url().should('eq','http://127.0.0.1:8000/admin')
        cy.contains('Total User')
        cy.contains('Total Post')
        cy.contains('Total Comment')
        cy.contains('Total Task')
    })
})