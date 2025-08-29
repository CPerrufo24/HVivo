// utils/guardarEnSheet.js

export async function guardarEnSheet({ origen, usuario_id, mensaje_usuario, respuesta_bot, interacciones }) {
  const endpoint = process.env.SHEETDB_URL;

  if (!endpoint) {
    console.warn("⚠️ SHEETDB_URL no está definido en el entorno");
    return;
  }

  const payload = {
    data: [{
      timestamp: new Date().toISOString(),
      origen,
      usuario_id,
      mensaje_usuario,
      respuesta_bot,
      interacciones
    }]
  };

  try {
    const response = await fetch(endpoint, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload)
    });

    const result = await response.json();
    console.log("✅ Historial guardado en SheetDB:", result);
  } catch (error) {
    console.error("❌ Error al guardar en SheetDB:", error.message);
  }
}
