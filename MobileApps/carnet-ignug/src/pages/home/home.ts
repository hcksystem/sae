import { Component, ViewChild } from '@angular/core';
import { NavController } from 'ionic-angular';
import { DatosCarnet } from './../../entidades/especifico/DatosCarnet';
import { OnInit } from '@angular/core/src/metadata/lifecycle_hooks';
import { Http } from '@angular/http';
import { ToastController } from 'ionic-angular';
import { Camera, CameraOptions } from '@ionic-native/camera';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})

export class HomePage implements OnInit {
  @ViewChild('fileInput') fileInput;
  qrCode = 'IGNUG';
  identificacion: string;
  fotoCarnet: string;
  ipWS: string;
  persona: DatosCarnet;
  webServiceURL = '/sae/server/';

  constructor(public navCtrl: NavController,
    public http: Http,
    public toastCtrl: ToastController,
    public camera: Camera) {

  }

  ngOnInit():void {
    this.fotoCarnet = 'http://172.16.11.28/fotos/camera.png';
    this.persona = new DatosCarnet();
    this.persona.cargo = 'CARGO';
    this.persona.identificacion = 'IDENTIFICACIÓN';
    this.persona.apellidos = 'APELLIDOS';
    this.persona.nombres = 'NOMBRES';
    this.qrCode = this.persona.identificacion;
  }

  guardar():void {
    if ( this.persona.idPersona == null ){
      return;
    }
    this.http.post('http://' + this.ipWS + this.webServiceURL + 'fotoperfil/update', JSON.stringify(this.persona))
      .subscribe(respuesta => {
        this.showToast('Carnét Guardado Satisfactoriamente');
      }, error => {
        console.log(error);
    });
  }

  getPicture():void {
    if (Camera['installed']()) {
      const options: CameraOptions = {
        quality: 100,
        destinationType: this.camera.DestinationType.DATA_URL,
        encodingType: this.camera.EncodingType.JPEG,
        mediaType: this.camera.MediaType.PICTURE,
        correctOrientation: true,
        allowEdit: true
      }
      this.camera.getPicture(options).then((imageData) => {
        this.persona.nombreArchivo = 'foto_desde_camara.jpg';
        this.persona.tipoArchivo = 'image/jpeg';
        this.persona.adjunto = imageData;
        this.fotoCarnet = 'data:' + this.persona.tipoArchivo + ';base64,' + this.persona.adjunto;
       }, (err) => {
      });
    } else {
      this.fileInput.nativeElement.click();
    }
  }

  subirImagen(event) {
    const reader = new FileReader();
        if (event.target.files && event.target.files.length > 0) {
            const file = event.target.files[0];
            reader.readAsDataURL(file);
            reader.onload = () => {
                this.persona.nombreArchivo = file.name;
                this.persona.tipoArchivo = file.type;
                this.persona.adjunto = reader.result.split(',')[1];
                this.fotoCarnet = 'data:' + this.persona.tipoArchivo + ';base64,' + this.persona.adjunto;
            };
        }
  }

  showToast(mensaje: string):void {
    let toast = this.toastCtrl.create({
      message: mensaje,
      position: 'middle',
      duration: 3000
    });
    toast.present();
  }
  getPersona():void {
    this.fotoCarnet = 'http://172.16.11.28/fotos/camera.png';
    this.http.get('http://' + this.ipWS + this.webServiceURL + 'datos_carnet/consultar?identificacion=' + this.identificacion)
      .subscribe(respuesta => {
        if ( JSON.stringify(respuesta.json()) == 'null' ) {
          this.persona.cargo = 'CARGO';
          this.persona.identificacion = 'IDENTIFICACIÓN';
          this.persona.apellidos = 'APELLIDOS';
          this.persona.nombres = 'NOMBRES';
          this.qrCode = this.persona.identificacion;
          this.showToast('Identificación no encontrada');
          return;
        }
        this.persona = respuesta.json() as DatosCarnet;
        this.qrCode = this.persona.identificacion;
      }, error => {
    });
  }
}
