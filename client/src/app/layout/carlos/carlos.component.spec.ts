import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CarlosComponent } from './carlos.component';

describe('CarlosComponent', () => {
  let component: CarlosComponent;
  let fixture: ComponentFixture<CarlosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CarlosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CarlosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
