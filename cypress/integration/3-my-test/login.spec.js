/// <reference types="cypress" />
const url = 'http://127.0.0.1:8000/admin'
describe('Login', function() {
  it('Login - Success', function() {
    cy.visit('http://127.0.0.1:8000/admin/login')
    cy.get('input[type="email"]').type('joshuatrinh5262@gmail.com')
    cy.get('input[type="password"]').type('123456789')
    cy.get('input[type="checkbox"]').check()
    cy.get('.login-btn').click()
    cy.url().should('eq',url)
    cy.contains('Dashboard')
  })
  it('Login - Fail', function() {
    cy.visit('http://127.0.0.1:8000/admin/login')
    cy.get('input[type="email"]').type('joshuatrinh5262@gmail.com')
    cy.get('input[type="password"]').type('0123456789')
    cy.get('input[type="checkbox"]').check()
    cy.get('.login-btn').click()
    cy.url().should('eq',url)
    cy.contains('Dashboard')
  })
})