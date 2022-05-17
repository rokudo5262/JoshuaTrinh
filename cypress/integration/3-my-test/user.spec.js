/// <reference types="cypress" />

describe('user', function() {
    it('user list', function() {
      cy.visit('http://127.0.0.1:8000/admin/login')
      cy.get('input[type="email"]').type('joshuatrinh5262@gmail.com')
      cy.get('input[type="password"]').type('123456789')
      cy.get('input[type="checkbox"]').check()
      cy.get('.login-btn').click()
      //
      cy.title().should('eq','JoshuaTrinh')
      cy.visit('http://127.0.0.1:8000/admin/user')
      
    })
  })