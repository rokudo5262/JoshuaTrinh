/// <reference types="cypress" />

describe(' Search user', function() {
    it('Search User with result', function() {
      cy.login('joshuatrinh5262@gmail.com','123456789')
      cy.visit('http://127.0.0.1:8000/admin/user')
      cy.get('input[class=search-user-bar]').type('User')
      cy.get('table tbody tr')
        .should(item => {
            expect(item[0]).to.contain.text('User')
            expect(item[1]).to.contain.text('User')
            expect(item[2]).to.contain.text('User')
            expect(item[3]).to.contain.text('User')
            expect(item[4]).to.contain.text('User')
            expect(item[5]).to.contain.text('User')
            expect(item[6]).to.contain.text('User')
        })
    })
    it('Search User withow result', function() {
        cy.login('joshuatrinh5262@gmail.com','123456789')
        cy.visit('http://127.0.0.1:8000/admin/user')
        cy.get('input[class=search-user-bar]').type('4569')
        cy.get('table[class=user-table] tbody tr').should('have.length',0)
        cy.get('input[class=search-user-bar]').invoke('addClass','Testing')
      })
  })