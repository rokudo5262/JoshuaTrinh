/// <reference types="cypress" />
const email = 'joshuaTrinh5262@gmail.com'
const password = '123456789'
describe('user', function() {
    beforeEach(() => {
      cy.login(email,password)
      cy.visit('/admin/user')
    })
    // it('go to user list test', function() {
    //   cy.title().should('eq','JoshuaTrinh')
    //   cy.visit('/admin/user')
    //   cy.contains("User List") 
    // })
    it('find user page button test with get', function() {
    
      // get all element by tag name
      cy.get("button")

      // get all element by class
      cy.get('.delete-multiple-user-btn')

      // get all element by id
      cy.get('#delete-multiple-user-btn')
      cy.getById('delete-multiple-user-btn')

      // get all element by specific class
      cy.get("[class='delete-multiple-user-btn btn btn-primary mb-3']")

      // get all element by specific attribute
      cy.get("[type='submit']")

      // get all element by tag name and class
      cy.get("button.delete-multiple-user-btn")

      // get all element by tag name and class and id
      cy.get("button.delete-multiple-user-btn#delete-multiple-user-btn")

      // get all element by tag name and attribute
      cy.get("button.delete-multiple-user-btn[type='submit']")
    })

    it('find user page button test with contain', function() {
      // get element by text
      cy.contains("Delete Multiple Users")

      // get element by text with seletor
      cy.contains("form","Delete Multiple Users")
      cy.contains("[type='submit']","Delete Multiple Users")
    })

    it('find user page button test with find', function() {
      cy.get("div").find('.delete-multiple-user-btn')
    })
  })