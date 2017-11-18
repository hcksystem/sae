import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { TutorCarreraComponent } from './tutorcarrera.component';

const routes: Routes = [
   { path: '', component: TutorCarreraComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class TutorCarreraRoutingModule { }
