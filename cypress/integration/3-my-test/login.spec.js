/// <reference types="cypress" />

// 1. Visit a web page.
// 2. Query for an element.
// 3. Interact with that element.
// 4. Assert about the content on the page.
const url = 'http://127.0.0.1:8000/admin'
const email = 'joshuatrinh5262@gmail.com'
const password = '123456789'
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
  it('Logout', function() {
    cy.login(email,password)
    cy.url().should('eq',url)
    cy.get('#navbarDropdown').click()
    cy.contains('Logout').click()
    cy.url().should('eq','http://127.0.0.1:8000/admin/login')
    cy.contains('Login')
  })
})