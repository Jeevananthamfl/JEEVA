import{newE2EPage}from"@stencil/core/testing";describe("presto-player-button",(()=>{it("renders",(async()=>{const t=await newE2EPage();await t.setContent("<presto-player-button></presto-player-button>");const e=await t.find("presto-player-button");expect(e).toHaveClass("hydrated")}))}));