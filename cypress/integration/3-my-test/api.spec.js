/// <reference types="cypress" />import { before } from "mocha";


const url = 'http://127.0.0.1:8000/admin/user';
describe('user', function() {
  // beforeEach(() => {
  //   cy.setCookie('joshuatrinh_session','pBk7V2vizJnmyVoFsz6fuSOxjAIgtcHxcW2MRrYJ')
  //   cy.request({
  //     method: "GET",
  //     url: "http://127.0.0.1:8000/api/user" ,
  //     body : {
  //     }
  //   })
  // })
    // it('Create New User - Success', function() {
    //   cy.login('joshuatrinh5262@gmail.com','123456789')
    //   cy.visit('http://127.0.0.1:8000/admin/user')
    //   cy.get('.create-new-user-btn').click()
    //   cy.url().should('include', '/user/create') 
    //   cy.get('input[name="first_name"]').type('black')
    //   cy.get('input[name="last_name"]').type('black')
    //   cy.get('input[name="email"]').type('black@gmail.com')
    //   cy.get('input[name="password"]').type('0123456789')
    //   cy.get('.create-new-user-form').submit()
    //   cy.contains('Add New User Successfully')
    // })
    it('get detail', function() {
      cy.intercept({
        method: "GET",
        url: "http://127.0.0.1:8000/api/user" ,
      }).as('userList')
      cy.intercept({
        method: "GET",
        url: "http://127.0.0.1:8000/api/user/count" ,
      }).as('countUser')
      cy.intercept({
        method: "GET",
        url: "http://127.0.0.1:8000/api/post/count" ,
      }).as('countPost')
      cy.intercept({
        method: "GET",
        url: "http://127.0.0.1:8000/api/comment/count" ,
      }).as('countComment')
      cy.intercept({
        method: "GET",
        url: "http://127.0.0.1:8000/api/task/count" ,
      }).as('countTask')
      //
      cy.login('joshuatrinh5262@gmail.com','123456789')
      cy.wait('@countUser')
      cy.wait('@countPost')
      cy.wait('@countComment')
      cy.wait('@countTask')
      cy.intercept({
        method: "GET",
        url: "http://127.0.0.1:8000/api/user" ,
      },{
        fixture: 'user'
      }).as('userTest')
      cy.visit(url)
      cy.wait('@userTest')
      // cy.request({
      //   method: "GET",
      //   url: "http://127.0.0.1:8000/api/user/1" ,
      //   body : {
      //     name: "test",
      //   }
      // })
    })
  })