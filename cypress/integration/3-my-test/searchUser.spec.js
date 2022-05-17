/// <reference types="cypress" />

describe(' Search user', function() {
    it('Search User with result', function() {
      cy.login('joshuatrinh5262@gmail.com','123456789')
      cy.visit('http://127.0.0.1:8000/admin/user')
      cy.get('input[class=search-user-bar]').type('joshua')
      cy.get('table tbody tr').should('have.length.greaterThan',1)
    })
    it('Search User withow result', function() {
        cy.login('joshuatrinh5262@gmail.com','123456789')
        cy.visit('http://127.0.0.1:8000/admin/user')
        cy.get('input[class=search-user-bar]').type('4569')
        cy.get('table[class=user-table] tbody tr').should('have.length',0)
      })
  })