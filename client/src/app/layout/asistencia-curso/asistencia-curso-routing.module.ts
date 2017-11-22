import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AsistenciaCursoComponent } from './asistencia-curso.component';

const routes: Routes = [
   { path: '', component: AsistenciaCursoComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class AsistenciaCursoRoutingModule { }
