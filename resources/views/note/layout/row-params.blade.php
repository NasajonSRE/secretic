<div class="row justify-content-center mt-4">
    <div class="col-4">
        <div class="form-floating">
            <select class="form-select" name="expiration_date" id="expiration_date"
                    aria-label="select example">
                <option selected>Nunca</option>
                <option value="1_hour">1 hora</option>
                <option value="1_day">1 dia</option>
                <option value="1_week">1 semana</option>
                <option value="1_month">1 mês</option>
            </select>
            <label for="expiration_date">Data de expiração</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-floating">
            <input class="form-control"
                   name="encrypt_password"
                   id="password_input"
                   type="password"
                   placeholder="Password">
            <label for="password_input">Senha (opcional)</label>

            @error('encrypt_password')
            <div class="py-2 text-red-500">
                <p class="font-extrabold font-outfit">
                    {{ $message }}
                </p>
            </div>
            @enderror
        </div>
    </div>
</div>

