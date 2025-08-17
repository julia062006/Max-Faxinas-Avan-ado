<?php 

enum EnStatusAgendamento: string {
    case PENDENTE = 'Pendente';
    case CANCELADO = 'Cancelado';
    case CONCLUIDO = 'Concluído';
}