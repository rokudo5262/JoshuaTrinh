/// <reference types="cypress" />

describe('user', function() {
  it('Create New User - Success', function() {
    cy.login('joshuatrinh5262@gmail.com','123456789')
    cy.visit('http://127.0.0.1:8000/admin/user')
    cy.get('.create-new-user-btn').click()
    cy.url().should('include', '/user/create') 
    cy.get('input[name="first_name"]').type('string')
    cy.get('input[name="last_name"]').type('string')
    cy.get('input[name="email"]').type('string@gmail.com')
    cy.get('input[name="password"]').type('0123456789')
    cy.get('.create-new-user-form').submit()
    cy.contains('Add New User Successfully')
  })
})