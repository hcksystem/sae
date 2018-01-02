import { Component, OnInit, ViewContainerRef} from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { ContactoEstudiantesNuevosService } from './contacto-estudiantes-nuevos.service';
@Component({
    selector: 'app-contacto-estudiantes-nuevos',
    templateUrl: './contacto-estudiantes-nuevos.component.html',
    styleUrls: ['./contacto-estudiantes-nuevos.component.scss']
})
export class ContactoEstudiantesNuevosComponent implements OnInit {
    busy: Promise<any>;
    constructor(public toastr: ToastsManager,
        vcr: ViewContainerRef) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {

    }

}
