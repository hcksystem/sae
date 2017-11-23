import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SecretariaAcademicaComponent } from './secretaria-academica.component';

describe('SecretariaAcademicaComponent', () => {
  let component: SecretariaAcademicaComponent;
  let fixture: ComponentFixture<SecretariaAcademicaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SecretariaAcademicaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SecretariaAcademicaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
