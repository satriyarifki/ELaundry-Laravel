describe("empty spec", () => {
    it("passes", () => {
        cy.visit("/");
        cy.get('[name="email"]').type("admin@gmail.com");
        cy.get('[name="password"]').type("password");
        cy.get('[name="login-button"]').click();

        cy.get('[data-id="sidebar-cust"]').click();
        cy.get('[data-id="sidebar-exp"]').click();
        cy.get('[data-id="sidebar-ext"]').click();
        cy.get('[data-id="sidebar-tran"]').click();

        cy.get('[data-id="app-nav"]').click();
        cy.get('[data-id="logout"]').click();
    });
});
