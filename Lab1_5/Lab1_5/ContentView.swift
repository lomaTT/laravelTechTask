//
//  ContentView.swift
//  Lab1_5
//
//  Created by Ivan Filipchuk on 25/05/2023.
//
import SwiftUI

struct ContentView: View {
    @State private var number1: String = ""
    @State private var number2: String = ""
    @State private var result: String = ""
    @State private var showAlert: Bool = false

    var body: some View {
        VStack {
            TextField("Liczba 1", text: $number1)
                .keyboardType(.decimalPad)
                .padding()
            
            TextField("Liczba 2", text: $number2)
                .keyboardType(.decimalPad)
                .padding()
            
            Button("Oblicz") {
                calculateResult()
            }
            .padding()
            
            if !result.isEmpty {
                Text("Wynik: \(result)")
                    .font(.headline)
                    .padding()
            }
        }
        .alert(isPresented: $showAlert) {
            Alert(title: Text("Błąd"), message: Text("Nie można obliczyć ilorazu"), dismissButton: .default(Text("OK")))
        }
    }
    
    private func calculateResult() {
        guard let num1 = Double(number1), let num2 = Double(number2) else {
            showAlert = true
            return
        }
        
        if num2 != 0 {
            result = String(num1 / num2)
        } else {
            showAlert = true
        }
    }
}

struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
