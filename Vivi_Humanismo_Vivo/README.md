
# 🤖 Vivi_Humanismo_Vivo – Backend del chatbot guía para Humanismo Vivo A.C.

Este repositorio contiene el backend del chatbot **VIVI**, asistente virtual de la Unidad de Diagnóstico Humanismo Vivo A.C. Está diseñado para guiar al usuario en el proceso de agendar estudios médicos, ofreciendo respuestas claras, rápidas y sin complicaciones.

---

## 🧬 Descripción del bot

VIVI es un chatbot guía, entrenado para:

- Detectar el estudio solicitado por el usuario (más de 1500 disponibles)
- Generar enlaces personalizados con parámetros precargados
- Brindar información básica sobre preparación, duración y disponibilidad
- Redirigir al usuario a atención humana si lo solicita

El bot está entrenado en Poe y desplegado en Vercel. No realiza diagnósticos ni ventas directas, pero sí facilita el acceso a servicios médicos confiables.

---

## 📦 Estructura del backend

Vivi_Humanismo_Vivo/ ├── api/ # Lógica principal del backend ├── utils/ # Funciones auxiliares ├── package.json # Dependencias y scripts ├── .env.example # Variables de entorno necesarias ├── README.md # Este archivo

Código

---

## 🚀 Despliegue

Este backend está preparado para ser desplegado en **Vercel**. Asegúrate de configurar las variables de entorno necesarias en el dashboard de Vercel.

### Variables sugeridas:

```env
POE_BOT_ID=xxxxxxxxxxxxxxxx
POE_API_KEY=xxxxxxxxxxxxxxxx
SHEETDB_URL=https://sheetdb.io/api/v1/xxxxxx
🔗 Enlaces importantes
🧠 Entrenamiento en Poe: [Agregar enlace aquí]

🌐 Enlace de Vercel: [Agregar enlace aquí]

📋 Documentación del flujo conversacional: flujo-vivi.md

📊 Logging en SheetDB: logging-sheetdb.md

📞 Contacto del cliente
WhatsApp: https://wa.me/525564277997

Correo: hvivo@hotmail.com

Dirección: Circuito Vial Dr. Jorge Jiménez Cantú No. 171, Las Mercedes, Atlacomulco, Edo. de México. C.P. 50455

✅ Checklist de entrega
[x] Carpeta renombrada como Vivi_Humanismo_Vivo

[x] Código limpio y sin .git interno

[x] Prompt base ajustado para chatbot guía

[x] Documentación modular

[ ] Enlace de Poe agregado

[ ] Enlace de Vercel agregado

🧩 Créditos
Desarrollado por Carlos Presuel Marrufo Arquitectura modular, entrenamiento en Poe, integración con SheetDB y despliegue en Vercel.

