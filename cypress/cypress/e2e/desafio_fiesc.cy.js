describe("template spec", () => {

    beforeEach(() => {
        cy.visit("http://127.0.0.1:8000");
        cy.wait(1500);
    });
    it("create a profile", () => {
        cy.get(":nth-child(2) > .nav-link").click();
        cy.wait(1000);

        cy.get("#name").type('username cypress');
        cy.get("#email").type('usernamecypress@example.com');
        cy.get("#password").type("cypresspass");
        cy.get("#password-confirm").type("cypresspass");

        cy.get(".btn").click();
        cy.wait(1000);
    });
    it("login and create a new task", () => {
        cy.get("#email").type('usernamecypress@example.com');
        cy.get("#password").type("cypresspass");

        cy.get(".btn").click();
        cy.wait(1000);

        cy.get('.btn-success').click();
        cy.wait(500);

        cy.get('#title').type('Uma atividade importante');
        cy.get('#description').type('É necessário elaborar um texto para que essa atividade importante seja finalizada');
        cy.get('#type').select('Incidente');
        cy.wait(250);
        cy.get('#priority').select('Alta');
        cy.wait(250);

        cy.get('.btn').click();
        cy.wait(500);
    });
    it("create a task and add a observation", () => {
      cy.get("#email").type('usernamecypress@example.com');
      cy.get("#password").type("cypresspass");

      cy.get(".btn").click();
      cy.wait(1000);

      cy.get('.btn-success').click();
      cy.wait(500);

      cy.get('#title').type('Uma atividade importante');
      cy.get('#description').type('É necessário elaborar um texto para que essa atividade importante seja finalizada');
      cy.get('#type').select('Incidente');
      cy.wait(250);
      cy.get('#priority').select('Alta');
      cy.wait(250);

      cy.get('.btn').click();
      cy.wait(500);

      cy.get('.orange-border > :nth-child(7) > .btn-primary').first().click();
      cy.wait(500);

      cy.get('#observation').type('Uma observação simples sobre essa tarefa importante.');
      cy.get(':nth-child(2) > form > .btn').click();
      cy.wait(1000);

  });
});
