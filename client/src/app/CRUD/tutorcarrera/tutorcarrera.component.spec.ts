import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { TutorCarreraComponent } from './tutorcarrera.component';

describe('TutorCarreraComponent', () => {
   let component: TutorCarreraComponent;
   let fixture: ComponentFixture<TutorCarreraComponent>;

   beforeEach(async(() => {
      TestBed.configureTestingModule({
         declarations: [ TutorCarreraComponent ]
      }).compileComponents();
   }));

   beforeEach(() => {
      fixture = TestBed.createComponent(TutorCarreraComponent);
      component = fixture.componentInstance;
      fixture.detectChanges();
   });

   it('should create', () => {
      expect(component).toBeTruthy();
   });
});